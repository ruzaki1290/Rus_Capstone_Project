<?php
   require("database.php");
   $querySelections = 'SELECT * FROM selections';
   $statement1 = $db->prepare($querySelections);
   $statement1->execute();
   $selections = $statement1->fetchAll();
   $statement1->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Manager - Home</title>
   <link rel="stylesheet" href="/Rus_Capstone_Project/product_manager/css/main.css">
</head>
<body>
   <?php include("header.php");?>
   <main>
      <h2>Product 1</h2>
      <?php 
         include('database.php');
         // gets the base price of a selected product from mySQL; 1 - represents Product 1
         $queryBasePrice = 'SELECT basePrice FROM products WHERE productID = 1';
         $statement1 = $db->prepare($queryBasePrice);
         $statement1->execute();
         $product = $statement1->fetch();
         $statement1->closeCursor();
         $basePrice = $product['basePrice'];
      ?>
      <h4>Base Price: $<?php echo number_format($basePrice, 2); ?></h4>
      <!-- redirects user with after the submit button is clicked to the page taht calculate the price -->
      <form action="calculate.php" method="post">
         <lable>Selection 1:</lable>
         <!-- <input type="text" name="Selection" /><br /> -->
         <select>
            <?php
               include('database.php');
               $queryOptions = 'SELECT * FROM options';
               $statement2 = $db->prepare($queryOptions);
               $statement2->execute();
               $options = $statement2->fetchAll();
               $statement2->closeCursor();
               foreach ($options as $optChoice) {
                    ?>
                     <option value="<?php echo $optChoice['optID'] ?>"><?php echo $optChoice['optName'] . ' - $' . $optChoice['price'] ?></option>
               <?php } ?>
         </select>
         <lable>Selection 2:</lable>
         <!-- <input type="text" name="Selection" /><br /> -->
         <select>
            <?php
               include('database.php');
               $queryOptions = 'SELECT * FROM options';
               $statement2 = $db->prepare($queryOptions);
               $statement2->execute();
               $options = $statement2->fetchAll();
               $statement2->closeCursor();
               foreach ($options as $optChoice) {
                    ?>
                     <option value="<?php echo $optChoice['optID'] ?>"><?php echo $optChoice['optName'] . ' - $' . $optChoice['price'] ?></option>
               <?php } ?>
         </select>
         <lable>Selection 3:</lable>
         <!-- <input type="text" name="Selection" /><br /> -->
         <select>
            <?php
               include('database.php');
               $queryOptions = 'SELECT * FROM options';
               $statement2 = $db->prepare($queryOptions);
               $statement2->execute();
               $options = $statement2->fetchAll();
               $statement2->closeCursor();
               foreach ($options as $optChoice) {
                    ?>
                     <option value="<?php echo $optChoice['optID'] ?>"><?php echo $optChoice['optName'] . ' - $' . $optChoice['price'] ?></option>
               <?php } ?>
         </select>
         <lable>Selection 4:</lable>
         <!-- <input type="text" name="Selection" /><br /> -->
         <select>
            <?php
               include('database.php');
               $queryOptions = 'SELECT * FROM options';
               $statement2 = $db->prepare($queryOptions);
               $statement2->execute();
               $options = $statement2->fetchAll();
               $statement2->closeCursor();
               foreach ($options as $optChoice) {
                    ?>
                     <option value="<?php echo $optChoice['optID'] ?>"><?php echo $optChoice['optName'] . ' - $' . $optChoice['price'] ?></option>
               <?php } ?>
         </select>
         <input type="submit" value="Calculate Total Price" class="submit-button">
      </form>

   </main>
   <?php include("footer.php");?>
</body>
</html>