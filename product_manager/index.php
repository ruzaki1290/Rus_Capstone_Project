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
      <h4>Base Price</h4>
      <form>
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
      </form>

   </main>
   <?php include("footer.php");?>
</body>
</html>