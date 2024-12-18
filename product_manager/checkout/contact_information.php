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
   <title>Contact Information</title>
   <link rel="stylesheet" href="/Rus_Capstone_Project/product_manager/css/main.css">
</head>
<body>
   <?php include("../view/header.php");?>
   <main>
      <h2>Contact Information</h2>
      <form action="save_customer_info.php" method="post">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required><br>

          <label for="address">Address:</label>
          <input type="text" id="address" name="address" required><br>

          <label for="postal_code">Postal Code:</label>
          <input type="text" id="postal_code" name="postal_code" required><br>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required><br>

          <label for="phone">Phone:</label>
          <input type="tel" id="phone" name="phone" required><br>

          <form action="../checkout/process_order.php" method="post">
            <input type="submit" value="Confirm Info" class="submit-button">
         </form>
      </form>
      <p><a href="../cart/cart.php">Go Back</a></p>
   </main>
</body>
   <?php include("../view/footer.php");?>
</html>