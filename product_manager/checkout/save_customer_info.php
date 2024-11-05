<?php
   session_start();
   session_start();
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   include('../database.php');

   // retrieve form data
   $name = isset($_POST['name']) ? $_POST['name'] : '';
   $address = isset($_POST['address']) ? $_POST['address'] : '';
   $postal_code = isset($_POST['postal_code']) ? $_POST['postal_code'] : '';
   $email = isset($_POST['email']) ? $_POST['email'] : '';
   $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

   // save customer info to the database
   $query = 'INSERT INTO customers (name, address, postal_code, email, phone) VALUES (:name, :address, :postal_code, :email, :phone)';
   $statement = $db->prepare($query);
   $statement->bindValue(':name', $name);
   $statement->bindValue(':address', $address);
   $statement->bindValue(':postal_code', $postal_code);
   $statement->bindValue(':email', $email);
   $statement->bindValue(':phone', $phone);
   $statement->execute();
   $statement->closeCursor();

   // save customer info in the session
   $_SESSION['customer_name'] = $name;
   $_SESSION['customer_address'] = $address;
   $_SESSION['customer_postal_code'] = $postal_code;
   $_SESSION['customer_email'] = $email;
   $_SESSION['customer_phone'] = $phone;

   // redirect to the order confirmation page
   header('Location: process_order.php');
   exit();
?>