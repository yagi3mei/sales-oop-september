<?php
require_once '../classes/Product.php';   // import User class

// Instance of the class
$product = new Product();

// Call the method
$product->buyProduct($_POST);
?>