<?php 
// récupération des champs venant du formulaire
require('../model/connect.php');
$nom = $_POST['nompromo'];
$description = $_POST['description'];
$datefin = $_POST['datefin'];
$promo = $_POST['promo'];

// Différents cas de figure

if(isset($_POST['ADD'])){ // AJOUT DE DONNEES

$sqlQueryADD = "INSERT INTO promotion SET nom_promo=:nom,desc_promo=:descri,date_fin=:datefin, pourcent=:promo";

 // Préparation
$insertTache = $pdo->prepare($sqlQueryADD);

// Exécution ! 
$insertTache->execute([
  'nom' => $nom,
  'descri' => $description,
  'datefin' => $datefin,
  'promo' => $promo
  
]); 


}

elseif(isset($_POST['MODIF'])){ // MODIFICATION DE DONNEES

  
  $sqlQueryMOD = "UPDATE promotion SET nom_promo=:nom,desc_promo=:descri,date_fin=:datefin, pourcent=:promo WHERE id_promo=".$_POST['idpromo'];
  
   // Préparation
  $update = $pdo->prepare($sqlQueryMOD);
  
  // Exécution ! 
  $update->execute([
    'nom' => $nom,
    'descri' => $description,
    'datefin' => $datefin,
    'promo' => $promo
    
  ]); 

  $sqlQueryMODothers = "UPDATE `produits` SET `promotion` =:nom WHERE `promotion`='".$_POST['old_nom_promo']."'";

  // Préparation
 $updateother = $pdo->prepare($sqlQueryMODothers);
 
 // Exécution ! 
 $updateother->execute([
   'nom' => $nom
   
 ]); 
  

}

elseif(isset($_POST['SUPPR'])){ // SUPPRESSION DE DONNEES

  $sqlQueryDEL = "DELETE FROM promotion WHERE id_promo=".$_POST['idpromo'];
  
  // Préparation
 $delete = $pdo->prepare($sqlQueryDEL);
 
 // Exécution ! 
 $delete->execute(); 

 $sqlQueryDELothers = "UPDATE `produits` SET `promotion`=NULL WHERE `promotion`='".$_POST['old_nom_promo']."'";
  $null= NULL;
 // Préparation
 $updateothers = $pdo->prepare($sqlQueryDELothers);
 
 // Exécution ! 
 $updateothers->execute(); 

}




     header("Location:../pages/promo.php"); //retour a la page de modification




    
?>