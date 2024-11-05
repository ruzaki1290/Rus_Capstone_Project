<?php
   session_start();
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   include('../database.php');

   // retrieve customer info from the session
   $name = isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : '';
   $address = isset($_SESSION['customer_address']) ? $_SESSION['customer_address'] : '';
   $postal_code = isset($_SESSION['customer_postal_code']) ? $_SESSION['customer_postal_code'] : '';
   $email = isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : '';
   $phone = isset($_SESSION['customer_phone']) ? $_SESSION['customer_phone'] : '';

   // retrieve the cart information from the session
   $cartItems = isset($_SESSION['cartItems']) ? $_SESSION['cartItems'] : [];
   $totalPrice = isset($_SESSION['totalPrice']) ? $_SESSION['totalPrice'] : 0;

   // delivery fee for orders under $200
   $deliveryFee = 0;
   if ($totalPrice < 200) {
      $deliveryFee = 20;
      $totalPrice += $deliveryFee;
   }
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
      <table>
         <h3>Customer's Details</h3>
         <tr>
         <th>Customer Information</th>
         <th>Details</th>
         </tr>
         <tr>
         <td><strong>Name:</strong></td>
         <td><?php echo htmlspecialchars($name); ?></td>
         </tr>
         <tr>
         <td><strong>Address:</strong></td>
         <td><?php echo htmlspecialchars($address); ?></td>
         </tr>
         <tr>
         <td><strong>Postal Code:</strong></td>
         <td><?php echo htmlspecialchars($postal_code); ?></td>
         </tr>
         <tr>
         <td><strong>Email:</strong></td>
         <td><?php echo htmlspecialchars($email); ?></td>
         </tr>
         <tr>
         <td><strong>Phone:</strong></td>
         <td><?php echo htmlspecialchars($phone); ?></td>
         </tr>
      </table>
      <table>
      <h3>Order Details</h3>
         <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Total</th>
         </tr>
         <?php foreach ($cartItems as $item) { ?>
            <tr>
               <td><?php echo $item['productName']; ?></td>
               <td>$<?php echo number_format($item['price'], 2); ?></td>
               <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
            </tr>
         <?php } ?>
      </table>
      <h3>Order Price</h3>
      <table>
         <tr>
         <th>Price Breakdown</th>
         <th>Amount</th>
         </tr>
         <tr>
         <td><strong>Total Price After Tax:</strong></td>
         <td>$<?php echo number_format($totalPrice, 2); ?></td>
         </tr>
         <tr>
         <td><strong>Delivery Fee:</strong></td>
         <td>$<?php echo number_format($deliveryFee, 2); ?></td>
         </tr>
         <tr>
         <td><strong>Total Price With Delivery:</strong></td>
         <td>$<?php echo number_format($totalPrice + $deliveryFee, 2); ?></td>
         </tr>
      </table>

      <form action="confirm_order.php" method="post">
         <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
      </form>
      <br>
      <form action="../checkout/order_confirmation.php" method="post">
         <input type="submit" value="Submit Your Order" class="submit-button">
      </form>
      <p><a href="contact_information.php">Go Back</a></p>
   </main>
   <?php include("../view/footer.php");?>
</body>
</html>