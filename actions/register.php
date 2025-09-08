<?php       // ../views/register.phpのformのactionの処理先として指定されているだけ
require_once '../classes/User.php';   // import User class

// Instance of the class
// Create an object 入れ物と機能を作る。
$user = new User();

// Call the method さっき作ったUserのstore機能をコールして値を取得させる。
$user->store($_POST);    // $_POST holds all the data from the form in views/register.php
// Array ( [first_name] => John [last_name] => Smith [username] => jone [password] => pasword123 )
// print_r($_POST);
?>