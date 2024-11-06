<?php
   session_start();
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>
   <link rel="stylesheet" href="/Rus_Capstone_Project/product_manager/css/main.css">
</head>
<body>
   <?php include("view/header.php");?>
   <main>
      <div class="hero-image">
         <img src="./images/hero_image_1.jpg" alt="Hero Image">
      </div>
      <div class="intro-text">
      <p>Welcome to our store! 👋 We offer a wide range of suits 🕴️ to meet all your needs. Choose a suit for your occasion and customize it the way you like. It's that simple! 🙂.</p>
      </div>
   </main>
   <?php include("view/footer.php");?>
</body>
</html>