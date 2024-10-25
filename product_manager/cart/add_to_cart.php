<?php
   session_start();
   include('database.php');
   include('cart_functions.php');

   $productID = $_POST['productID'];
   $quantity = $_POST['quantity'];

   addToCart($db, $productID, $quantity);

   header('Location: cart.php');
   exit();
?>