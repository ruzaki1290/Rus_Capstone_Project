<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dsn = 'mysql:host=localhost;dbname=capstone_project';
$username = 'root';
$password = '';
try {
   $db = new PDO($dsn, $username, $password);
} catch (PDOexception $e) {
   $_SESSION["database_error"] = $e->getMessage();
   $url = "database_error.php";
   header("Location: " . $url);
   exit();
}
?>