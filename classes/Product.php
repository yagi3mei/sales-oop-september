<?php
require_once 'Database.php';    // import Database class

class Product extends Database {
    // logic of the app, CRUD

    // Read all products
    public function getAllProducts() {
        $sql = "SELECT * FROM products";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            die("Error retgetAllProductrieving all products: " . $this->conn->error);
        }
    }

    // add product
    public function store($request) {
        $product_name = $request['product_name'];
        $price        = $request['price'];
        $quantity     = $request['quantity'];

        $sql = "INSERT INTO products (`product_name`, `price`, `quantity`)
                VALUES ('$product_name', $price, $quantity)";
        
        if ($this->conn->query($sql)) {
            header('location: ../views/dashboard.php');   // go to index.php
            exit;
        } else {
            die("Error add the product: " . $this->conn->error);
        }
    }

    // READ product
    public function getProduct($id) {
        $sql = "SELECT * FROM products WHERE id = $id";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            die("Error retrieving the product: " . $this->conn->error);
        }
    }

    // count the products
    public function getCountProducts() {
        $sql = "SELECT count(*) FROM products";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            die("Error retrieving the products count: " . $this->conn->error);
        }
    }

    // UPDATE product
    public function update($request) {
        $id           = $request['id'];           // id of the logged in user
        $product_name = $request['product_name'];
        $price        = $request['price'];
        $quantity     = $request['quantity'];

        $sql = "UPDATE products 
                SET product_name = '$product_name',
                    price  = $price,
                    quantity   = $quantity
                WHERE id = $id";

        if ($this->conn->query($sql)) {
            header('location: ../views/dashboard.php');
        } else {
            die("Error updating the product: " . $this->conn->error);
        }
    }

    // UPDATE quantity
    public function buyProduct($request) {
        $id           = $request['id'];           // id of the logged in user
        $quantity     = $request['quantity'];

        $sql = "UPDATE products 
                SET quantity   = $quantity
                WHERE id = $id";

        if ($this->conn->query($sql)) {
            header('location: ../views/dashboard.php');
        } else {
            die("Error updating the quantity: " . $this->conn->error);
        }
    }

    // Delete
    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = $id";

        if ($this->conn->query($sql)) {
            header('location: ../views/dashboard.php');
        } else {
            die("Error deleting the product: " . $this->conn->error);
        }
    }
}