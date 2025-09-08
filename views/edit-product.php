<?php
session_start();

require_once '../classes/Product.php';   // import User class

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: dashboard.php");
    exit;
}

$product_obj = new Product();
$product = $product_obj->getProduct($id);   // get all users from the database

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include 'main-nav.php';
    ?>

    <main class="w-50 mx-auto">
        <div class="text-center mb-4">
            <h1 class="text-primary"><i class="fa-solid fa-boxes-stacked"></i> Add Product</h1>
        </div>
        <form action="../actions/edit-product.php" method="post">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="product_name" value="<?= $product['product_name'] ?>" required>
            </div>

            <div class="row">
                <div class="col">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" required>
                    </div>
                </div>
                <div class="col">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $product['quantity'] ?>" required>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-100">Add</button>
            </div>
        </form>
    </main>
</body>
</html>