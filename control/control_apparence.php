<?php 
// récupération des champs venant du formulaire

require('../model/connect.php');
require('../model/ftpconnect.php');

// Ecriture de la requête
  $titre=$_POST['titre'];
  if(isset($_POST['logo'])){
    $logo=$_POST['logo'];
  }
  
  $repo=$_POST['repo'];

  // établir une connexion au serveur FTP
$conn_id = ftp_connect($ftp_server) or die("Impossible de se connecter au serveur FTP");

// se connecter au serveur FTP avec le nom d'utilisateur et le mot de passe
$login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

// vérifier si la connexion et l'authentification ont réussi
if ((!$conn_id) || (!$login_result)) {
    echo "La connexion FTP a échoué !";
   
    exit;
}


if(!empty($_FILES['logo']['name'])){  
  
  if($repo!=""){
  
  // 1 - SUPPRESSION

$delete = ftp_delete($conn_id, $repo);



if(!$delete){
    echo "La suppression de l'image a échoué !";
}
}

// 2 - ENVOI  

// récupérer les informations sur l'image envoyée
$image_name = $_FILES['logo']['name'];
$image_temp = $_FILES['logo']['tmp_name'];


// Définition du dossier de réception
$dossier = 'assets/icons/'; 
$file=$dossier.$image_name;


// envoyer l'image sur le serveur FTP
$upload = ftp_put($conn_id, $dossier.$image_name, $image_temp, FTP_BINARY);



// vérifier si l'envoi a réussi
if (!$upload) {
    echo "L'envoi de l'image a échoué !";
          } 

else {

  

  $sqlQuery = "UPDATE home SET nom_site=:name, logo_site=:linkpng ";


   // Préparation
$insertTache = $pdo->prepare($sqlQuery);

// Exécution ! 
$insertTache->execute([
    'name' => $titre,
    'linkpng' => $file
]); 
 
      }


    
    // fermer la connexion FTP


  }
 
else{

  $sqlQuery = "UPDATE home SET nom_site=:name";


  // Préparation
$insertTache = $pdo->prepare($sqlQuery);

// Exécution ! 
$insertTache->execute([
   'name' => $titre
]); 
  
}



ftp_close($conn_id);

header("Location:../pages/apparence.php"); //retour a la modification
    
?>