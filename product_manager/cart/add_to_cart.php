<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../database.php');
include('cart_functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productID = isset($_POST['productID']) ? $_POST['productID'] : null;
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;

    if ($productID && $quantity) {
        // Retrieve the total price after tax from the session
        $totalPriceAfterTax = isset($_SESSION['totalPriceAfterTax']) ? $_SESSION['totalPriceAfterTax'] : 0;

        // Add the item to the cart
        addToCart($db, $productID, $quantity);

        // Redirect to the cart page
        header('Location: cart.php');
        exit();
    } else {
        echo "Product ID or quantity is missing.";
    }
} else {
    echo "Invalid request method.";
}

   // session_start();
   // include('database.php');
   // include('cart_functions.php');

   // $productID = $_POST['productID'];
   // $quantity = $_POST['quantity'];

   // // retireves the total price after tax from the session
   // $totalPriceAfterTax = isset($_SESSION['totalPriceAfterTax']) ? $_SESSION['totalPriceAfterTax'] : 0;

   // // add the item to the cart
   // addToCart($db, $productID, $quantity);

   // // redirect to the cart page
   // header('Location: cart.php');
   // exit();
?>