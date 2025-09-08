<?php
session_start();

require_once '../classes/Product.php';   // import User class

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: dashboard.php");
    exit;
}

// Instance of the class
$product = new Product();

// Call the method
$product->delete($id);

?>