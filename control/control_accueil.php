<?php 
// récupération des champs venant du formulaire

require('../model/connect.php');

// Ecriture de la requête
  $titre=$_POST['titre'];
  $description=$_POST['description'];

  $sqlQuery = "UPDATE accueil SET titre=:titre,descr=:descri";

   // Préparation
$insertTache = $pdo->prepare($sqlQuery);

// Exécution ! 
$insertTache->execute([
    'titre' => $titre,
    'descri' => $description
]); 
 
     





header("Location:../pages/accueil.php"); //appel de la page menu_principal.php
    
?>



