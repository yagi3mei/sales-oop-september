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
    <title>Buy Product</title>
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
        <div class="mb-4">
            <h1 class="text-success"><i class="fa-solid fa-cash-register"></i> Buy Product</h1>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label class="form-label text-secondary">Product Name</label>
                <h1 class="form-control-plaintext"><?= $product['product_name'] ?></h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label class="form-label text-secondary">Price</label>
                <h1 class="form-control-plaintext"><?= $product['price'] ?></h1>
            </div>
            <div class="col-6">
                <label class="form-label text-secondary">Stocks Left</label>
                <h1 class="form-control-plaintext"><?= $product['quantity'] ?></h1>

            </div>
        </div>

        <form action="payment.php" method="post">
            <div class="row">
                <div class="col">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <label for="buy-quantity" class="form-label text-secondary">Buy Quantity</label>
                    <input type="number" class="form-control" id="buy-quantity" name="buy_quantity" max="<?= $product['quantity'] ?>" required>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success w-100">Pay</button>
            </div>
        </form>
    </main>
</body>
</html>