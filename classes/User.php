<?php
require_once 'Database.php';    // import Database class

class User extends Database {
    // logic of the app, CR

    // CREATE ../actions/register.phpから呼ばれて動作する。
    // store all data of the user to the database
    public function store($request) {           // $request is equivalent to $_POST
        $first_name = $request['first_name'];
        $last_name  = $request['last_name'];
        $username   = $request['username'];
        $password   = $request['password'];

        // 現在値のチェックは何もしていない。usernameのダブりもチェックしていない。　---> 注意

        $password = password_hash($password, PASSWORD_DEFAULT); // hash the password 60-character long

        $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`)
                VALUES ('$first_name', '$last_name', '$username', '$password')";
        
        if ($this->conn->query($sql)) {
            header('location: ../views');   // go to index.php
            exit;                           // name as die
        } else {
            die("Error creating the user: " . $this->conn->error);
        }
    }

    // READ ../actions/login.phpから呼ばれて動作する。
    // authenticate the login details
    public function login($request) {
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        // 1. Check the username    結果が1列しかない場合はusernameが存在し、ダブりもない状態
        if ($result->num_rows == 1) {
            // 2. CHeck if the password is correct
            $user = $result->fetch_assoc();     // transeform the data from the database into associative array
            // print_r($user);
            // Array ( [id] => 1 [first_name] => Tadashi [last_name] => Yagiura [username] => tadashi [password] => $2y$10$e2vG3JNkM3dbDmS.NJDk/uzWCBirz3hW3gdmFWNLbYI9AX1I.Rbtq [photo] => )

            if (password_verify($password, $user['password'])) {
                // Create session variables for future use
                session_start();
                $_SESSION['id']        = $user['id'];
                $_SESSION['username']  = $user['username'];
                $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];

                header('location: ../views/dashboard.php');
                exit;
            } else {
                die("Error: Password is incorrect.");       // 2. Passwordチェックのエラー
            }
        } else {
            die("Error: Username not found.");              // 1. Usernameチェックのエラー
        }
    }

    // LOGOUT ../actions/logout.phpから呼ばれて動作する。
    // logouts the user and remove user details from session
    public function logout() {
        session_start();
        session_unset();   // remove all session variables
        session_destroy(); // destroy the session

        header('location: ../views');  // go to index.php
        exit;
    }
}