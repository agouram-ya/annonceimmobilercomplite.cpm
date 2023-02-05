<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>





<section class="categories">

   <h1 class="heading">post categories</h1>

   <div class="box-container">
      <div class="box"><span>01</span><a href="category.php?category=nature">pack gratuit</a></div>
      <div class="box"><span>02</span><a href="category.php?category=eduction">Pack starter </div>
      <div class="box"><span>03</span><a href="category.php?category=pets and animals">Pack bronze </a></div>
      <div class="box"><span>04</span><a href="category.php?category=technology">Pack agence immo </a></div>
      <div class="box"><span>05</span><a href="category.php?category=fashion">Pack sur mesure </a></div>
     
   </div>

</section>

<script src="js/script.js"></script>

</body>
</html>