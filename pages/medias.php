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
  
  $images = 'SELECT * FROM images';
  $listeimages = $pdo->prepare($images);
  $listeimages->execute();
  $img = $listeimages->fetchAll();


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
  


 

<?php if(isset($_GET['view'])){?>     <div class="container-fluid py-4"><div class="row"> 

        <!-- CONTENT -->
<div class="d-flex justify-content-center" style="gap: 50px;">
<a type="button" href="medias.php?view=true" class="btn <?php if ($_GET['view']=="true") {
  echo "btn-primary";
}
else{echo "btn-default";}
?>">Images</a>
<a type="button" href="medias.php?view=video" class="btn <?php if ($_GET['view']=="true") {
  echo "btn-default";
}
else{echo "btn-primary";}
?>">Vidéos</a>
</div>

        <h3 class="mb-3">Liste des médias</h3>
        <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Produit associé</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
        </tr>
      </thead>
      <tbody><?php 
        
        
  if ($_GET['view']=='video') {
      
  $images = 'SELECT * FROM images WHERE type_media="video"';
  $listeimages = $pdo->prepare($images);
  $listeimages->execute();
  $medsel = $listeimages->fetchAll();
  }
     else{ 
      $images = 'SELECT * FROM images WHERE type_media="image"';
  $listeimages = $pdo->prepare($images);
  $listeimages->execute();
  $medsel = $listeimages->fetchAll();
     }
        foreach ($medsel as $a) {
    
        
        ?>

        <tr>
          <td>
            <div class="d-flex px-2 py-1" style="gap: 20px;">
              <div class="col-md-1 me-2">
                <img src="../medias/<?php echo $a['url_image'];?>" class="img-fluid img-thumbnail">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?php echo $a['url_image'];?></h6>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0"><?php echo $a['affectation_produit'];?></p>
          </td>
          <td class="align-middle text-center text-sm"><?php echo $a['id_image'];?>
          </td>
        </tr>
        

        <?php }
       ?>
      </tbody>
    </table>
  </div>
</div>
        



     
     
     
     
     
     
     
     
     
     
     </div> <?php } 
      
      
      
      
      
      
      
      
      
      
      
      elseif(isset($_GET['id'])) {
        
        
          
  $images = 'SELECT * FROM images WHERE `affectation_produit`="'.$_GET['id'].'" AND type_media="image"';
  $listeimages = $pdo->prepare($images);
  $listeimages->execute();
  $img = $listeimages->fetchAll();
  
  $videos = 'SELECT * FROM images WHERE `affectation_produit`="'.$_GET['id'].'" AND type_media="video"';     
  $listevideos = $pdo->prepare($videos);
  $listevideos->execute();
  $vid = $listevideos->fetchAll();
        ?> <!-- AJOUTER MEDIA -->



        
        <div class="container-fluid py-4">
      <div class="row">

      <form action="../control/control_medias.php" method="POST" enctype="multipart/form-data">
        <h3>Ajouter une image</h3>
      <div class="form-group mb-0">
    <label for="exampleFormControlTextarea1">Joindre l'image</label>
        <input type="hidden" name="produit" value="<?php echo $_GET['id']?>"> 
    <input type="file" required name="images[]" class="form-control" id="exampleFormControlInput1" onchange="validateImageFile(this)">
<label id="fileError" style="color: red;"></label>

<script>
function validateImageFile(input) {
  const fileInputimg = input;
  const fileErrorimg = document.getElementById('fileError');
  
  if (fileInputimg.files.length === 0) {
    fileErrorimg.textContent = 'Veuillez sélectionner un fichier';
    fileInputimg.value = ''; // Réinitialiser le champ de fichier
    return;
  }
  
  const allowedExtensionsimg = /\.(png|jpg|jpeg|gif|webp|avif|bmp)$/i;
  const selectedFileimg = fileInputimg.files[0];
  
  if (!allowedExtensionsimg.exec(selectedFileimg.name)) {
    fileErrorimg.textContent = 'Le fichier sélectionné n\'est pas une image (formats autorisés : .png, .jpg, .jpeg, .gif, .webp, .avif, .bmp).';
    fileInputimg.value = ''; // Réinitialiser le champ de fichier
    return;
  }
  
  fileErrorimg.textContent = ''; // Effacer tout message d'erreur
}
</script>

  </div>

  <div class="form-group">
  <input type="hidden" name="produit" value="<?php echo $_GET['id']?>"> 
    <button type="submit" name="IMAGE" class="btn btn-success">Ajouter</button>
  </div></form>
  <h3 class="mb-3">Images de <?php echo $_GET['id'];?></h3>
 

  <?php 
  if(!empty($img)){
  foreach ($img as $im) {?>
    <div class="col-sm-6 col-md-3 col-xs-12 mb-3 mx-3">
    
 <form action="../control/control_medias.php" method="POST">
<div class="card">
<div class="card-body p-0">
      <a href="../medias/<?php echo$im['url_image'];?>" class="d-block">
        <img src="../medias/<?php echo$im['url_image'];?>" class="img-fluid border-radius-lg">
      </a>
      </div>

      <div class="card-footer d-flex justify-content-center flex-column align-items-center text-center">
      <p><?php echo $im["url_image"]?></p>
      <input type="hidden" name="idimg" value="<?php echo $im['id_image'];?>"> 
      <input type="hidden" name="repertoire" value="<?php echo $im['url_image'];?>">
      <button type="button" class="btn btn-danger mb-0 mt-3" data-bs-toggle="modal" data-bs-target="#modalsuppr<?php echo $im['id_image'];?>">Supprimer</button> 
      </div>
      

  <!-- Modal SUPPRESSION-->
  <div class="modal fade" id="modalsuppr<?php echo $im['id_image'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr ?</h5>
      <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      Voulez-vous vraiment supprimer cette image ?
    </div>
    <div class="modal-footer">
    <input type="hidden" name="produit" value="<?php echo $_GET['id']?>"> 
      <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Annuler</button>
      <button type="submit" name="SUPPR" class="btn bg-gradient-danger">Supprimer</button>
    </div>
  </div>
</div>
</div>

  </div>
</form>
</div> 

<?php
  }
}
else{
  echo "<SuiTypography class='mb-3 variant='body'>Aucune image n'est attribuée.</SuiTypography>";
}
  ?>



  
<form action="../control/control_medias.php" method="POST" enctype="multipart/form-data">
  <h3>Ajouter une vidéo</h3>
      <div class="form-group mb-0">
    <label for="exampleFormControlTextarea1">Joindre la vidéo</label>
 
    <input type="file" required id='video' name="video" class="form-control" id="exampleFormControlInput2" placeholder="Vidéo du site" onchange="validateVideoFile(this)">
<label id="fileErrorVideo" style="color: red;"></label></div>

<script>
function validateVideoFile(input) {
  const fileInput = input;
  const fileError = document.getElementById('fileErrorVideo');
  
  if (fileInput.files.length === 0) {
    fileError.textContent = 'Veuillez sélectionner un fichier IDDJ.';
    fileInput.value = ''; // Réinitialiser le champ de fichier
    return;
  }
  
  const allowedExtensions = /\.(mp4|webm|avi)$/i;
  const selectedFile = fileInput.files[0];
  
  if (!allowedExtensions.exec(selectedFile.name)) {
    fileError.textContent = 'Le fichier sélectionné n\'est pas une vidéo (formats autorisés : .mp4, .webm, .avi).';
    fileInput.value = ''; // Réinitialiser le champ de fichier
    return;
  }
  
  fileError.textContent = ''; // Effacer tout message d'erreur
}
</script>

      <div class="form-group">
      <input type="hidden" name="produit" value="<?php echo $_GET['id']?>"> 
    <button type="submit" name="VIDEO" class="btn btn-success">Ajouter</button>
  </div></form>



<h3 class="mb-3">Vidéos de <?php echo $_GET['id'];?></h3>


  <?php 
  if(!empty($vid))
  {
  foreach ($vid as $vi) {
?> 
<form action="../control/control_medias.php" method="POST" enctype="multipart/form-data">
<?php 
    echo '<div class="col-sm-6 col-md-3 col-xs-12 mb-3 mx-3">
<div class="card">
<div class="card-body p-0">
      <a href="../medias/'.$vi['url_image'].'" class="d-block">
        <img src="../medias/'.$vi['url_image'].'" class="img-fluid border-radius-lg">
      </a>
      </div>

      <div class="card-footer d-flex justify-content-center flex-column align-items-center text-center">
      <p>'.$vi["url_image"].'</p>
      
      <button type="button" class="btn btn-danger mb-0 mt-3" data-bs-toggle="modal" data-bs-target="#modalsuppr'.$vi['id_image'].'">Supprimer</button> 
      </div>
  </div>';
?>
   <input type="hidden" name="idimg" value="<?php echo $im['id_image'];?>"> 
   <input type="hidden" name="repertoire" value="<?php echo $im['url_image'];?>"> 
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
        Voulez-vous vraiment supprimer cette vidéo ?
      </div>
      <div class="modal-footer">
      <input type="hidden" name="produit" value="<?php echo $_GET['id']?>"> 
        <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" name="SUPPR" class="btn bg-gradient-danger">Supprimer</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php
  }
}
else{
 
    echo "<SuiTypography class='mb-3 variant='body'>Aucune vidéo n'est attribuée.</SuiTypography>";
  
}
  ?>

</div>

      </div>


      <?php }
      
      else{
        
?>

<script>window.location.replace("medias.php?view=true");</script>
<?php
      }
      ?>








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