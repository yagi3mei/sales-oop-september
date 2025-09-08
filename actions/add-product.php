<?php       // ../views/register.phpのformのactionの処理先として指定されているだけ
require_once '../classes/Product.php';   // import User class

// Instance of the class
$product = new Product();

// Call the method
$product->store($_POST);
?>