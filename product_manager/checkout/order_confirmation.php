<?php
   session_start();
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   include('../database/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order Confirmation</title>
   <link rel="stylesheet" href="/Rus_Capstone_Project/product_manager/css/main.css">
</head>
<body>
   <?php include("../view/header.php");?>
   <main>
      <h2>Order Confirmation</h2>
      <h3>We have recieved your order 📦✅ Thank you for choosing our store! 🤠</h3>
      <p><a href="process_order.php">Go Back</a></p>
      <p><a href="../product_page.php">Continue Shopping</a></p>
   </main>
   <?php include("../view/footer.php");?>
</body>
</html>