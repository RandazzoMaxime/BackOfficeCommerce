<?php 
// récupération des champs venant du formulaire

require('../model/connect.php');

// définir les informations de connexion au serveur FTP
require('../model/ftpconnect.php');



$affectation = $_POST['produit'];


if(isset($_POST['IMAGE']))
{

  $typemedia = 'image';
  
// récupérer les informations sur les images envoyées
$images = $_FILES['images'];
$totalImages = sizeof($_FILES['images']['name']);

// établir une connexion au serveur FTP
$conn_id = ftp_connect($ftp_server) or die("Impossible de se connecter au serveur FTP");

// se connecter au serveur FTP avec le nom d'utilisateur et le mot de passe
$login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

// vérifier si la connexion et l'authentification ont réussi
if ((!$conn_id) || (!$login_result)) {
    echo "La connexion FTP a échoué !";
    exit;
}

for ($i = 0; $i < $totalImages; $i++) {
    // récupération des champs venant du formulaire


    $image_name = $images['name'][$i];
    $image_temp = $images['tmp_name'][$i];

    // Définition du dossier de réception
    $dossier = 'birbone/medias/';
    $file = $dossier . $image_name;

    // envoyer l'image sur le serveur FTP
    $upload = ftp_put($conn_id, $dossier . $image_name, $image_temp, FTP_BINARY);

    // vérifier si l'envoi a réussi
    if (!$upload) {
        echo "L'envoi de l'image $image_name a échoué !";
    } else {
        // Effectue la requête si le fichier est uploadé
        $sqlQuery = 'INSERT INTO images(affectation_produit, type_media, url_image) 
        VALUES (:aff,:typemed,:rep)';

        // Préparation
        $insertTache = $pdo->prepare($sqlQuery);

        // Exécution !
        $insertTache->execute([
            'aff' => $affectation,
            'typemed' => $typemedia,
            'rep' => $image_name
        ]);
    }
}

}

elseif(isset($_POST['VIDEO']))
{

  $typemedia = 'video';
  
// récupérer les informations sur les images envoyées
$images = $_FILES['video'];
$totalImages = sizeof($_FILES['video']['name']);

// établir une connexion au serveur FTP
$conn_id = ftp_connect($ftp_server) or die("Impossible de se connecter au serveur FTP");

// se connecter au serveur FTP avec le nom d'utilisateur et le mot de passe
$login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

// vérifier si la connexion et l'authentification ont réussi
if ((!$conn_id) || (!$login_result)) {
    echo "La connexion FTP a échoué !";
    exit;
}

for ($i = 0; $i < $totalImages; $i++) {
    // récupération des champs venant du formulaire


    $image_name = $images['name'][$i];
    $image_temp = $images['tmp_name'][$i];

    // Définition du dossier de réception
    $dossier = 'birbone/medias/';
    $file = $dossier . $image_name;

    // envoyer l'image sur le serveur FTP
    $upload = ftp_put($conn_id, $dossier . $image_name, $image_temp, FTP_BINARY);

    // vérifier si l'envoi a réussi
    if (!$upload) {
        echo "L'envoi de la vidéo $image_name a échoué !";
    } else {
        // Effectue la requête si le fichier est uploadé
        $sqlQuery = 'INSERT INTO images(affectation_produit, type_media, url_image) 
        VALUES (:aff,:typemed,:rep)';

        // Préparation
        $insertTache = $pdo->prepare($sqlQuery);

        // Exécution !
        $insertTache->execute([
            'aff' => $affectation,
            'typemed' => $typemedia,
            'rep' => $file
        ]);
    }
}

}

elseif(isset($_POST['SUPPR']))
{
    $repo='birbone/medias/'.$_POST['repertoire'];
   
// établir une connexion au serveur FTP
$conn_id = ftp_connect($ftp_server) or die("Impossible de se connecter au serveur FTP");

// se connecter au serveur FTP avec le nom d'utilisateur et le mot de passe
$login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

// vérifier si la connexion et l'authentification ont réussi
if ((!$conn_id) || (!$login_result)) {
    echo "La connexion FTP a échoué !";
   
    exit;
}


$delete = ftp_delete($conn_id, $repo);



if(!$delete){
    echo "La suppression de l'image a échoué !";
}
else{

$sqlQuery = 'DELETE FROM images WHERE `id_image` ='.$_POST['idimg'];

// Préparation
$insertTache = $pdo->prepare($sqlQuery);

// Exécution !  
$insertTache->execute();

}

}

// fermer la connexion FTP
ftp_close($conn_id);


header("Location:../pages/medias.php?id=".$affectation); //retour a la page de modification


    
?>