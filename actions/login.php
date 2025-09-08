<?php
require_once '../classes/User.php';   // import User class

// Create an object
$user = new User();

// call the method  さっき作った$userのloing機能をコールして値を取得させる。
$user->login($_POST);
?>
