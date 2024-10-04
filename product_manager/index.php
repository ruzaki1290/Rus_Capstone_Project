<?php
   require("database.php");
   $queryContacts = 'SELECT * FROM product1';
   $statement1 = $db->prepare($queryContacts);
   $statement1->execute();
   $product1 = $statement1->fetchAll();
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
      <h4>Base Price</h4>
      <table>
         <tr>
            <th>Option1</th>
            <th>Option2</th>
            <th>Option3</th>
            <th>Option4</th>
         </tr>
      </table>
   </main>
   <?php include("footer.php");?>
</body>
</html>