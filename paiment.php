<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $propre = $_POST['propre'];
   $propre = filter_var($propre, FILTER_SANITIZE_STRING);
   $cvv = $_POST['cvv'];
   $cvv = filter_var($cvv, FILTER_SANITIZE_STRING);
   $numero = sha1($_POST['numero']);
   $numero = filter_var($numero, FILTER_SANITIZE_STRING);
   $moi = $_POST['moi'];
   $moi = filter_var($moi, FILTER_SANITIZE_STRING);
   $anne = $_POST['anne'];
   $anne = filter_var($anne, FILTER_SANITIZE_STRING);
    $pay = $conn->prepare("INSERT INTO `pay`(`proprete`, `cvv`, `numero`, `moi`, `anne`) VALUES(?,?,?,?,?)");
$pay->execute([$propre,$cvv,$numero,$moi,$anne]);

         }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/paiment.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="logo/2.png" alt="Icon" style="width: 50px; height:50px; ;">
                </div>
                <h1 class="m-0 text-primary">immobilier</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
           
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="homme.html" class="nav-item nav-link active">Home</a>
                    <a href="presentation.html" class="nav-item nav-link">Presentation</a>
                    <a href="pack.html" class="nav-item nav-link">Pack</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="register.php" class="nav-item nav-link" >cree votre compte</a>
                        <a href="login.php" class="nav-item nav-link" >connect</a>
                </div>   
             
            </div>
        </nav>
    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <form action="home.php" method="post">
    <div class="container">
        <h1>Confirmez votre paiement</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Propriétaire</h3>
                <div class="input-field">
                    <input type="text" name="propre">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" name="cvv">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Numéro de carte</h3>
                <div class="input-field">
                    <input type="text" name="numero">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>annne de  carte</h3>
            <input type="text" name="moi" placeholder="moi">
            <input type="text" name="anne" placeholder="anne">

                   
        </div>
        <input  class="a"type="submit" name="submit" value="Confirm">
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

 