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
  
  $promo = 'SELECT * FROM `promotion`';
  $listepromo = $pdo->prepare($promo);
  $listepromo->execute();
  $acc = $listepromo->fetchAll();

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
<h3>Ajouter une promotion</h3>
      <form action="../control/control_promo.php" method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom de la promotion</label>
    <input type="text" name="nompromo" class="form-control" id="exampleFormControlInput1" placeholder="Nom de la promotion" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description de la promotion</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Valeur de la promotion (%)</label>
    <input type="number" size="3" min="1" max="100" name="promo" class="form-control" id="exampleFormControlInput1" placeholder="Valeur de la promotion (en %)" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Date d'expiration de la promotion</label>
    <input type="datetime-local" name="datefin" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="form-group">
    <button type="submit" name="ADD" class="btn btn-success">Ajouter</button>
  </div>
  

</form>

      </div>


      <div class="row"> 
        <!-- CONTENT -->
        <h3 class="mb-3">Modifier / supprimer des promotions</h3>
        
        
        <?php
        if(!empty($acc)){

       
        foreach ($acc as $a) {
    
        
        ?><div class="promo col-sm-6 col-md-3 col-xs-12 mb-3"><form action="../control/control_promo.php" method="POST">
  <div class="card">


  <div class="card-body pt-2">
    <a class="card-title h5 d-block text-darker">
      <?php echo $a['nom_promo'].' | <span class="text-gradient text-primary">-'.$a['pourcent'].'%</span>';?>
    </a>
    <p class="card-description mb-0">
    <?php echo $a['desc_promo'];?>
    </p>
    <div class="author align-items-center">
      
      <div class="name">

        <div class="stats">
        <?php if($a['date_fin']>$currentDate) { 
echo '<small>Expire';
            }
            else {
              echo '<small style="color:red;">A expiré';
            }?> le <?php 
            
            $dt = strtotime($a['date_fin']);
            echo date('d/m/Y', $dt);?> à <?php echo date('H:i', $dt); ?></small>
        </div>
      </div>

        

    </div>
   <div class="container ps-0"> 


    <button type="button" class="btn btn-info mb-0 mt-3 me-3" data-bs-toggle="modal" data-bs-target="#modification<?php echo $a['id_promo']?>">Modifier</button>   
    <button type="button" class="btn btn-danger mb-0 mt-3" data-bs-toggle="modal" data-bs-target="#modalsuppr<?php echo $a['id_promo']?>">Supprimer</button> 
  <input type="hidden" name="idpromo" value="<?php echo $a['id_promo'];?>">
  <input type="hidden" name="old_nom_promo" value="<?php echo $a['nom_promo'];?>">
</div>
  </div>


  <!-- Modal MODIFICATION-->
    <div class="modal fade" id="modification<?php echo $a['id_promo']?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Modifier la promotion</h3>
              
              </div>
              <div class="card-body">
             
                  <label>Nom de la promotion</label>
                  <div class="input-group mb-3">
                    <input type="text" name="nompromo" class="form-control" placeholder="Nom de la promo" value="<?php echo $a['nom_promo'];?>">
                  </div>
                  <label>Description de la promotion</label>
                  <div class="input-group mb-3">
                  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?php echo $a['desc_promo'];?></textarea>
                  </div>
                  <label>Valeur de la promotion (%)</label>
                  <div class="input-group mb-3">
                    <input type="number" min="1" max="100" name="promo" class="form-control" placeholder="Valeur de la promotion (%)" value="<?php echo $a['pourcent'];?>">
                  </div>
                  <label>Date d'expiration de la promotion</label>
                  <div class="input-group mb-3">
                    <input type="datetime-local" name="datefin" class="form-control" value="<?php echo $a['date_fin'];?>" placeholder="Date d'expiration">
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
<div class="modal fade" id="modalsuppr<?php echo $a['id_promo']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr ?</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer cette promotion ?
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
else{ 
  
  echo "<SuiTypography class='mb-3 variant='body'>Aucune promotion n'existe.</SuiTypography>";

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