
<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
if(isset($_POST['submit'])){
  $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);
   $select_user = $conn->prepare("SELECT * FROM `contact` WHERE email = ?");
   $select_user->execute([$email]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   if($select_user->rowCount() > 0){
    $message[] = 'email already exists!';
 }else{
    $insert_user = $conn->prepare("INSERT INTO `contact`( `name`, `email`, `message`) VALUES ('?,?,?')");
    $insert_user->execute([$name, $email, $message]);
    $select_user = $conn->prepare("SELECT * FROM `contact` WHERE email = ? ");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
    if($select_user->rowCount() > 0){
       $_SESSION['user_id'] = $row['id'];
       header('location:contact.php');
    }

}}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.0/swiper-bundle.css">
    
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
    <title>espace immobilier</title>
</head>
<style>
    @media only screen and (max-width: 480px){
    .contact-text{
     font-size: 20px;
    }
  }
</style>
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
        <section id="contact">
  
            <h1 class="section-header">Contact</h1>
            
            <div class="contact-wrapper">
              <form id="contact-form" class="form-horizontal" role="form">
                 
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="" required>
                  </div>
                </div>
          
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
                  </div>
                </div>
          
                <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>
                <input type="submit" value="envoyer" name="submit" class="btn">

<!--                 
                <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND" name="submit">
                  <div class="alt-send-button">
                    <i class="fa fa-paper-plane"></i><span class="send-text">envoyer</span>
                  </div>
                
                </button>
                 -->
              </form>
              
          
              
                <div class="direct-contact-container">
          
                  <ul class="contact-list">
                    <li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text place"style="font-size: 15px;">Marrakech</span> </span></i></li>
                    
                    <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a href="tel:1-212-555-5555" title="Give me a call" style="font-size: 15px;">(212) 555-2368</a></span></i></li>
                    
                    <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a href="mailto:#" title="Send me an email" style="font-size: 15px;">annonceimmobilier@gmail.com</a></span></i></li>
                    
                  </ul>
          
                  <hr>
                  <ul class="social-media-list">
                    <li><a href="#" target="_blank" class="contact-icon">
                      <i class="fa fa-github" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#" target="_blank" class="contact-icon">
                      <i class="fa fa-codepen" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#" target="_blank" class="contact-icon">
                      <i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#" target="_blank" class="contact-icon">
                      <i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>       
                  </ul>
                  <hr>
          
                  <div class="copyright">&copy; ecrire votre message</div>
          
                </div>
              
            </div>
            
          </section>  
            
  <script>
    document.querySelector('#contact-form').addEventListener('submit', (e) => {
    e.preventDefault();
    e.target.elements.name.value = '';
    e.target.elements.email.value = '';
    e.target.elements.message.value = '';
  });
  </script>          
        














        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contactez-nous</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Lieu, Ville, Pays</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://twitter.com/freewebsitecode"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://facebook.com/freewebsitecode"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://youtube.com/freewebsitecode"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://linkedin/in/freewebsitecode"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Liens rapides</h5>
                        <a class="btn btn-link text-white-50" href="">homme</a>
                        <a class="btn btn-link text-white-50" href="">Presentation</a>
                        <a class="btn btn-link text-white-50" href="">Pack</a>
                        <a class="btn btn-link text-white-50" href="">contact</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Galerie de photos</h5>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">contact</h5>
                        <p>contact nous!</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="votre mail">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">login</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="https://freewebsitecode.com">espaces-immobilière</a>,2023. 
                            
                            
                            Designed By <a class="border-bottom" href="https://freewebsitecode.com">yami servitech</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                             
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
<div>

</div>
     
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>