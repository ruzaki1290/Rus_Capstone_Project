<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../database.php');
include('cart_functions.php');

// retrieve the cart contents
$cartItems = getCartContents($db);
$totalPrice = 0;
foreach ($cartItems as $item) {
   $totalPrice += $item['price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>
   <link rel="stylesheet" href="/Rus_Capstone_Project/product_manager/css/main.css">
</head>
<body>
   <?php include("../view/header.php");?>
   <main>
      <h2>Shopping Cart</h2>
      <table>
         <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Action</th>
         </tr>
         <?php foreach ($cartItems as $item) { ?>
            <tr>
               <td><?php echo $item['productName']; ?></td>
               <td><?php echo $item['price']; ?></td>
               <td><a href="remove_from_cart.php?cartItemID=<?php echo $item['cartItemID']; ?>">Remove</a></td>
            </tr>
         <?php } ?>
      </table>
      <p>Total Price After Tax: <strong>$<?php echo $totalPrice; ?></strong></p>
      <p><a href="../index.php">Continue Shopping</a></p>
      <p><a href="../checkout/checkout.php">Proceed to Checkout</a></p>
   </main>
   <?php include("../view/footer.php");?>
</body>
</html>