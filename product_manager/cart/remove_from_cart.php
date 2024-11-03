<?php
   session_start();
   include('../database.php');
   include('./cart_functions.php');

   if (isset($_GET['cartItemID'])) {
      $cartItemID = $_GET['cartItemID'];
      removeFromCart($db, $cartItemID);
      header('Location: ./cart.php');
      exit();
   } else {
      // redirects to cart page if cartItemID is not set
      header('Location: ./cart/cart.php');
      exit();
   }
?>