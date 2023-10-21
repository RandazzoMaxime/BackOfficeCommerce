<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  require('../model/connect.php');
  if (!isset($_SESSION['isUserLoggedIn'])){
    header("location:../control/login.php");
  }

  $back = 'SELECT * FROM `back_list` ORDER BY id ASC';
  $listeback = $pdo->prepare($back);
  $listeback->execute();
  $pages = $listeback->fetchAll();
  
  $produit = 'SELECT * FROM `produits`';
  $listeproduit = $pdo->prepare($produit);
  $listeproduit->execute();
  $acc = $listeproduit->fetchAll();
  
  $promotion = 'SELECT * FROM `promotion` ORDER BY id_promo ASC';
  $listepromo = $pdo->prepare($promotion);
  $listepromo ->execute();
  $promo = $listepromo->fetchAll();

$pageactive = basename($_SERVER['PHP_SELF']);
date_default_timezone_set('Europe/Paris');
$currentDate =  date('Y-m-d H:i:s');


  ?>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Gestion de Birbone
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/f410ec60f5.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
<style> 
.col-8{
  display: flex;
    flex-direction: column;
    justify-content: center;
}

.card{
  transition: 0.4s;
}


.sidenav-toggler-line{
  height: 2.5px !important;
}

.nav-link i {
  opacity: 1 !important;
}
</style>


</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../index.php" target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Gestion de Birbone</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
          <div style="background-image: linear-gradient(310deg, #cb0c9f 0%, #cb0c9f 100%);" class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> 
          <i class="fa-solid fa-chalkboard"></i>
            </div>
            <span class="nav-link-text ms-1">Tableau de bord</span>
          </a>
        </li>
        <?php foreach ($pages as $page) {
           if ($page['nom']=='Médias') { ?>

<li class="nav-item">
<a class="nav-link  <?php if($pageactive==$page['adresse']){echo'active';} ?> " href="<?php echo $page['adresse']; ?>?view=true">
          <div style="background-image: linear-gradient(310deg, #cb0c9f 0%, #cb0c9f 100%);" class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> 
            <?php echo $page['logo_awesome'];?></div>
            <span class="nav-link-text ms-1"><?php echo $page['nom'];?></span>
          </a>

        </li>
</div>
        </li>




           <?php 
           }
           else{

           
           ?>
        <li class="nav-item">
          <a class="nav-link <?php if($pageactive==$page['adresse']){echo'active';} ?> " href="<?php echo $page['adresse'];?>">
          <div style="background-image: linear-gradient(310deg, #cb0c9f 0%, #cb0c9f 100%);" class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> 
            <?php echo $page['logo_awesome'];?></div>
            <span class="nav-link-text ms-1"><?php echo $page['nom'];?></span>
          </a>
        </li>
       <?php }
      } ?>

      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
      <ul class="navbar-nav mt-2 justify-content-center"> <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li></ul>
    
        <div class="collapse justify-content-end navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
        
          <ul class="navbar-nav  justify-content-end">
          
            <li class="nav-item d-flex align-items-center">
              <a href="control/logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Déconnexion</span>
              </a>
            </li>
           
         
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4"><!-- AJOUTER PROMO -->
      <div class="row">
<h3>Ajouter un produit</h3>
      <form action="../control/control_produit.php" method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom du produit</label>
    <input type="text" name="nomproduit" class="form-control" id="exampleFormControlInput1" placeholder="Nom du produit" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description du produit</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Prix du produit</label>
    <input type="number" name="prix" class="form-control" id="exampleFormControlInput1" placeholder="Prix" required>
  </div>


  <div class="form-check form-switch mb-3">
  <input class="form-check-input" name="visible" type="checkbox" id="flexSwitchCheckDefault1" checked value="1">
  <label class="form-check-label" for="flexSwitchCheckDefault1">Produit visible par les clients ?</label>
</div>


<div class="form-check form-switch mb-3">
  <input class="form-check-input" name="miseavant" type="checkbox" id="flexSwitchCheckDefault2" value="1">
  <label class="form-check-label" for="flexSwitchCheckDefault2">Mettre en avant sur la page d'accueil ?</label>
</div>



  <div class="form-group">
    <button type="submit" name="ADD" class="btn btn-success">Ajouter</button>
  </div>
  

</form>

      </div>


      <div class="row"> 
        <!-- CONTENT -->
        <h3 class="mb-3">Modifier / supprimer des produits</h3>
        <?php 
        if(!empty($acc))
        {
        
        foreach ($acc as $a) {
    
        
        ?><div class="promo col-sm-6 col-md-3 col-xs-12 mb-3"><form action="../control/control_produit.php" method="POST">
  <div class="card">


  <div class="card-body text-center pt-2">
    <a class="card-title h5 d-block text-darker">
      <?php echo $a['nom_produit'].' | <span class="text-gradient text-primary">'.$a['prix'].'€</span>';?>
    </a>
    <p class="card-description mb-0">
    <?php echo $a['desc_produit'];?>
    </p>
    <div class="author align-items-center justify-content-center">
      
      <div class="name">

        <div class="stats">
        <?php if(!isset($a['promotion']) || $a['promotion'] =='Aucune') { 
echo 'Aucune promotion attribuée';
            }
            
            else { 


              $prom = 'SELECT * FROM `promotion` WHERE nom_promo="'.$a['promotion'].'"';
              $listeprom = $pdo->prepare($prom);
              $listeprom ->execute();
              $d = $listeprom->fetchAll();

              

              $valpromo = $d[0]['pourcent'];
            

              echo '<small>Promotion : '.$a['promotion'].' <span class="text-warning text-gradient">-'.$valpromo.'% </span></small>';
              echo '<br><small >Prix avec promo : <span class="text-warning text-gradient">'.($a['prix']*(1-($valpromo/100))).'€</span></small>';
            }?> 
        </div>
      </div>

        

    </div>

    <?php 
    
              $imgp = 'SELECT * FROM `images` WHERE affectation_produit="'.$a['nom_produit'].'"';
              $listeimg = $pdo->prepare($imgp);
              $listeimg ->execute();
              $imgprod = $listeimg->fetchAll();
    if(!empty($imgprod)){
      
    ?>

    <div class="my-3">    
  <div id="carouselExampleIndicators<?php echo $a['id_produit']?>" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">

      <?php for ($i=0; $i < sizeof($imgprod); $i++) { ?>
        
      <button type="button" data-bs-target="#carouselExampleIndicators<?php echo $i;?>" data-bs-slide-to="<?php echo $i;?>" <?php if($i==0){echo 'class="active" aria-current="true"';} ?>  aria-label="Slide <?php echo $i;?>"></button>
    
     <?php }?>
    
    </div>
    
    
     <div class="carousel-inner">
  <?php
$countimg = 0;

    foreach ($imgprod as $img) { 
      
      $countimg++;
      ?>
    
      <div class="carousel-item <?php if($countimg==1){echo "active";}?>">
        <img src="../medias/<?php echo $img['url_image'];?>" class="d-block w-100" alt="...">
      </div>
  <?php  }?>
    
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators<?php echo $a['id_produit']?>" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators<?php echo $a['id_produit']?>" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Suivant</span>
    </button>
   
  </div> </div> <?php  } ?>

   <div class="container d-flex p-0 justify-content-center" style="flex-wrap: wrap;
    column-gap: 40px;"> 


    <button type="button" class="btn btn-info mb-0 mt-3" data-bs-toggle="modal" data-bs-target="#modification<?php echo $a['id_produit']?>">Modifier</button>
    <a href="medias.php?id=<?php echo $a['nom_produit']?>" class="btn btn-warning mb-0 mt-3">Médias</a>      
    <button type="button" class="btn btn-danger mb-0 mt-3" data-bs-toggle="modal" data-bs-target="#modalsuppr<?php echo $a['id_produit']?>">Supprimer</button> 
    
  <input type="hidden" name="idproduit" value="<?php echo $a['id_produit'];?>">
  <input type="hidden" name="old_nom_produit" value="<?php echo $a['nom_produit'];?>">
</div>
  </div>


  <!-- Modal MODIFICATION-->
    <div class="modal fade" id="modification<?php echo $a['id_produit'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Modifier le produit</h3>
              
              </div>
              <div class="card-body">
             
                  <label>Nom du produit</label>
                  <div class="input-group mb-3">
                    <input type="text" name="nomproduit" class="form-control" placeholder="Nom de la promo" value="<?php echo $a['nom_produit'];?>">
                  </div>
                  <label>Description du produit</label>
                  <div class="input-group mb-3">
                  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?php echo $a['desc_produit'];?></textarea>
                  </div>
                  <label>Prix du produit (€)</label>
                  <div class="input-group mb-3">
                    <input type="number" name="prix" class="form-control" placeholder="Valeur de la promotion (%)" value="<?php echo $a['prix'];?>">
                  </div>
                

                  <label>Produit visible</label>
                  <div class="form-check form-switch">
  <input class="form-check-input" name="visible" type="checkbox" id="flexSwitchCheckVIS<?php echo $a['id_produit'];?>" <?php if($a['visible']){echo 'checked';}?> value="1">
  <label class="form-check-label ps-3" for="flexSwitchCheckVIS<?php echo $a['id_produit'];?>">Produit visible par les clients ?</label>
</div>
                  

<label>Mise en avant</label>
                  <div class="form-check form-switch">
  <input class="form-check-input" name="miseavant" type="checkbox" id="flexSwitchCheckMIS<?php echo $a['id_produit'];?>" <?php if($a['mise_avant']){echo 'checked';}?> value="1">
  <label class="form-check-label ps-3" for="flexSwitchCheckMIS<?php echo $a['id_produit'];?>">Mettre en avant sur la page d'accueil ?</label>
</div>
             
<label>Stock</label>
                  <div class="form-check form-switch">
  <input class="form-check-input" name="stock" type="checkbox" id="flexSwitchCheckSTOCK<?php echo $a['id_produit'];?>" <?php if($a['en_stock']){echo 'checked';}?> value="1">
  <label class="form-check-label ps-3" for="flexSwitchCheckSTOCK<?php echo $a['id_produit'];?>">Produit en stock ?</label>
</div>
               
<label>Promotion associée</label>
                  <div class="input-group">
                  <select class="form-control" name="promotion" id="exampleFormControlSelect1" required>
                    
      <?php       if (!isset($a['promotion']) || $a['promotion']=="Aucune") {
        echo '<option selected="selected">Aucune</option>';
      }
    else{
      echo '<option>Aucune</option>';
    } 
      
      foreach ($promo as $pro) {
                      if ($pro['nom_promo']==$a['promotion']) {
                        echo"<option selected='selected'>".$pro['nom_promo']."</option>";
                      } else{
                        echo"<option>".$pro['nom_promo']."</option>";
                      }
                        

                    
                           }     ?>
 
                  </select>
                  </div>

                  <div class="text-center">
                    <button type="submit" name="MODIF" class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Modifier</button>
                  </div>
               
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  


    <!-- Modal SUPPRESSION-->
<div class="modal fade" id="modalsuppr<?php echo $a['id_produit']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr ?</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer ce produit ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" name="SUPPR" class="btn bg-gradient-danger">Supprimer</button>
      </div>
    </div>
  </div>
</div>


</div>
</div>
  

</form>
<?php }
} 

else {
  echo "<SuiTypography class='mb-3 variant='body'>Aucun produit n'existe.</SuiTypography>";
}?>



      </div>










      <footer class="footer pt-3  ">
      </footer>
    </div>
  </main>
 

  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>