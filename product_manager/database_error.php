<?php
   session_start();
   ("database.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Manager - Database Error</title>
   <link rel="stylesheet" href="/Rus_Capstone_Project/product_manager/css/main.css">
</head>
<body>
   <?php include("header.php");?>
   <main>
      <h1>Database Error</h1>
      <p>There was an error connecting to the database!</p>
      <p>The database must be installed.</p>
      <p>MySQL must be running.</p>
      <p>Error message: <?php echo $_SESSION["database_error"]; ?></p>
      <p><a href="index.php">View Products List</a></p>

   </main>
   <?php include("footer.php");?>
</body>
</html>