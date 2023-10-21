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
  
  $home = 'SELECT * FROM `home`';
  $listehome = $pdo->prepare($home);
  $listehome->execute();
  $acc = $listehome->fetchAll();


  $pageactive = basename($_SERVER['PHP_SELF']);
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

.card:hover{
  transform: scale(1.03);
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
    <div class="container-fluid py-4">
      <div class="row">
        <!-- CONTENT -->
       <h3>Modification de l'identité du site</h3>
        <?php foreach ($acc as $a) {
    
        
        ?><form action="../control/control_apparence.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Titre du site</label>
    <input type="text" name="titre" class="form-control" id="exampleFormControlInput1" placeholder="Titre du site" value="<?php echo $a['nom_site'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Logo du site</label>
    
    <div class="col-md-1 col-4 col-sm-3 mb-3">
<div class="card card-blog card-plain">
<div class="position-relative">
<a class="">
<img class="img-fluid border-radius-xl" src="../<?php echo $a['logo_site'];?>">
</a>
</div>
</div>
</div>
    <input type="file" name="logo" class="form-control" id="exampleFormControlInput1" placeholder="Logo du site">
    <input type="hidden" name="repo" value="<?php echo $a['logo_site'];?>">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-success">Modifier</button>
  </div>
  

</form>
<?php } ?>



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

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>