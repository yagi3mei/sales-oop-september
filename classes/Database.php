<?php

// This is change main branch

class Database {
    private $server_name = "localhost";         // private誰からも見れないので安全（子も知らない）
    private $username = "root";                 // privateなのでrootを直接書いても安全    
    private $password = "";                     // privateなのでpasswordを直接書いても安全
    private $db_name = "sales-oop";             // privateなのでdb_nameを直接書いても安全
    protected $conn;                            // protectedは継承したクラスからのみ見れる

    public function __construct() {
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);
        // $this->conn holds the connection to the database

        // Check the Connection
        if ($this->conn->connect_error) {
            die("Unable to connect to the database: " . $this->conn->connect_error);
        }
    }
}
?>
