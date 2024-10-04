<?php 
   session_start();
   $dsn = 'mysql:host=localhost;dbname=capstone_project';
   $username = 'root';
   $password = '';

   try {
      $db = new PDO($dsn, $username, $password);
   }
   catch (PDOexeption $e)
   {
      $SESSION["databse_error"] = $e->getMessage();
      $url = "database_error.php";
      header("Location: " . $url);
      exit();
   }
?>