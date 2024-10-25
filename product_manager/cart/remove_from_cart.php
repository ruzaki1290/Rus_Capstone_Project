<?php
   session_start();
   include('../databse.php');
   include('cart_functions.php');

   if (isset($_GET['cartItemID'])) {
      $cartItemID = $_GET['cartItemID'];
      removeFromCart($db, $cartItemID);
      header('Location: cart.php');
      exit();
   } else {
      // redirects tot cart page if cartItemID is not set
      header('LocationL cart.php');
      exit();
   }
?>