<?php 
// récupération des champs venant du formulaire
require('../model/connect.php');
$nom = $_POST['nomproduit'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$stock=1;

if(isset($_POST['visible']))
{
  $visible = $_POST['visible'];
}
else{
  $visible = 0;
}

if(isset($_POST['miseavant']))
{
  $miseavant = $_POST['miseavant'];
}
else
{
  $miseavant = 0;
}



// Différents cas de figure

if(isset($_POST['ADD'])){ // AJOUT DE DONNEES

$sqlQueryADD = "INSERT INTO produits SET nom_produit=:nom,desc_produit=:descri,prix=:prix, en_stock=:stock, visible=:visi, mise_avant=:miseav";

 // Préparation
$insertTache = $pdo->prepare($sqlQueryADD);

// Exécution ! 
$insertTache->execute([
  'nom' => $nom,
  'descri' => $description,
  'prix' => $prix,
  'stock' => $stock,
  'visi' => $visible,
  'miseav' => $miseavant
  
]); 


}

elseif(isset($_POST['MODIF'])){ // MODIFICATION DE DONNEES

  $stock = $_POST['stock'];
  $promotion = $_POST['promotion'];

  $sqlQueryMOD = "UPDATE produits SET nom_produit=:nom,desc_produit=:descri,prix=:prix, en_stock=:stock, visible=:visi, mise_avant=:miseav, promotion=:promo WHERE id_produit=".$_POST['idproduit'];

   // Préparation
  $update = $pdo->prepare($sqlQueryMOD);
  
  // Exécution ! 
  $update->execute([
    'nom' => $nom,
  'descri' => $description,
  'prix' => $prix,
  'stock' => $stock,
  'visi' => $visible,
  'miseav' => $miseavant,
  'promo' => $promotion
    
  ]); 
  
  $sqlQueryMODothers = "UPDATE images SET affectation_produit=:nom WHERE affectation_produit='".$_POST['old_nom_produit']."'";

  // Préparation
 $updateother = $pdo->prepare($sqlQueryMODothers);
 
 // Exécution ! 
 $updateother->execute([
   'nom' => $nom
   
 ]); 


}

elseif(isset($_POST['SUPPR'])){ // SUPPRESSION DE DONNEES

  $sqlQueryDEL = "DELETE FROM produits WHERE id_produit=".$_POST['idproduit'];
  
  // Préparation
 $delete = $pdo->prepare($sqlQueryDEL);
 
 // Exécution ! 
 $delete->execute(); 

}




header("Location:../pages/produits.php"); //retour a la page de modification


    
?>