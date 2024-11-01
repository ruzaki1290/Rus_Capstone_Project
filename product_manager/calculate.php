<?php
   session_start();
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   include('database.php');
   include('cart/cart_functions.php');
   

   // get selected options from the form
   $selection1 = $_POST['selection1'] ? $_POST['selection1'] : null;
   $selection2 = $_POST['selection2'] ? $_POST['selection2'] : null;
   $selection3 = $_POST['selection3'] ? $_POST['selection3'] : null;
   $selection4 = $_POST['selection4'] ? $_POST['selection4'] : null;

   // function to get the price of an option
   function getOptionPrice($db, $optID) {
      if ($optID === null) {
         return 0;
      }
      $query = 'SELECT price FROM options WHERE optID = :optID';
      $statement = $db->prepare($query);
      $statement->bindValue(':optID', $optID);
      $statement->execute();
      $option = $statement->fetch();
      $statement->closeCursor();
      return $option['price'];
   }

   // calculate total price
   $totalPrice = 0;
   $totalPrice += getOptionPrice($db, $selection1);
   $totalPrice += getOptionPrice($db, $selection2);
   $totalPrice += getOptionPrice($db, $selection3);
   $totalPrice += getOptionPrice($db, $selection4);

   // fetch the base price from the products table
   $queryBasePrice = 'SELECT basePrice FROM products WHERE productID = 1';
   $statement1 = $db->prepare($queryBasePrice);
   $statement1->execute();
   $product = $statement1->fetch();
   $statement1->closeCursor();
   $basePrice = $product['basePrice'];

   // add the base price to the total price
   $totalPrice += $basePrice;

   // total price after tax
   $taxRate = 0.13;
   $totalPriceAfterTax = $totalPrice * (1 + $taxRate);

   // stores the total price with tax in the session
   $_SESSION['totalPriceAfterTax'] = $totalPriceAfterTax;

   //handle form submission to add items to the cart(REPLACED BY add_to_cart.php)
   // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
   //    $productID = 1; // assuming productID is 1 for this example
   //    $quantity = 1; // assuming quantity is 1 for this example
   //    addToCart($db, $productID, $quantity);
   //    header('Location: ./cart/cart.php');
   //    exit();
   // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Manager - Calculate</title>
   <link rel="stylesheet" href="/Rus_Capstone_Project/product_manager/css/main.css">
</head>
<body>
   <?php include("view/header.php");?>
   <main>
      <h2>Total Price</h2>
      <p>The total product price is: <strong>$<?php echo number_format($totalPrice, 2); ?></strong></p>
      <p>The tax applied is: <strong>13%</strong></p>
      <p>The total product price after tax: <strong>$<?php echo number_format($totalPriceAfterTax, 2); ?></strong></p>
      <form action="cart/add_to_cart.php" method="post">
         <input type="hidden" name="selection1" value="<?php echo $selection1; ?>">
         <input type="hidden" name="selection2" value="<?php echo $selection2; ?>">
         <input type="hidden" name="selection3" value="<?php echo $selection3; ?>">
         <input type="hidden" name="selection4" value="<?php echo $selection4; ?>">
         <input type="hidden" name="productID" value="1"> <!-- assuming productID is 1 for this example -->
         <input type="hidden" name="quantity" value="1"> <!-- assuming quantity is 1 for this example -->
         <input type="submit" name="add_to_cart" value="Add to Cart" class="submit-button">
      </form>
      <p><a href="index.php">Go Back</a></p>
   </main>
   <?php include("view/footer.php");?>
</body>
</html>