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
<?php require('../model/connect.php');
 
 @$login=$_POST["email"];
 @$pass=md5($_POST["password"]);
 @$valider=$_POST["valider"];
 

 if (isset($_SESSION['isUserLoggedIn'])){
  header("location:../index.php");
  }

 else{
  
 }
 
 
 if(isset($valider)){
 
    $sel=$pdo->prepare("select * from admin where email=? and password=? limit 1");
    $sel->execute(array($login,$pass));
    $tab=$sel->fetchAll();
    if(count($tab)>0){
      $_SESSION['isUserLoggedIn'] = true;
      $_SESSION['emailId'] = $_POST['email'];
      header("location:../index.php");
    }
    else{
       $erreur="Mauvais login ou mot de passe!";}
 }

 
?>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Gestion Birbone | Connexion
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
 
  <main class="main-content  mt-0">
    <section>
      <div class="min-vh-100" style="display: flex; align-items: center;">
        <div class="container">
          <div class="row"style="display:flex;">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Bon retour !</h3>
                  <p class="mb-0">Entre ton email et ton mot de passe pour te connecter <?php if (isset($erreur))
                   {
                    echo "<br><span style='color:red;'>Mauvais mot de passe ou email </span> ";
                  } ?></p>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <label>Email</label>
                    <div class="mb-3">
                      <input name="email" type="email" autocomplete="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Mot de passe</label>
                    <div class="mb-3">
                      <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                
                    <div class="text-center">
                      <button type="submit" name="valider" class="btn bg-gradient-info w-100 mt-4 mb-0">Se connecter</button>
                    </div>
                  </form>
                </div>
              
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 d-md-block d-none me-n8" style="height:100vh;">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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