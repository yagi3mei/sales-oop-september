<?php
session_start();

require_once '../classes/Product.php';   // import User class

$product_obj = new Product();

$count_products = $product_obj->getCountProducts();    // get count products
$all_products = $product_obj->getAllProducts();   // get all users from the database

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include 'main-nav.php';
    ?>

    <main class="w-75 mx-auto">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h2 class="text-start">Product List</h2>
            </div>
            <div class="col-auto">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addProductModal"><h2><i class="fa-solid fa-plus text-primary"></i></h2>
            </button>
            </div>
        </div>
            <?php
            if ($count_products['count(*)'] == 0) {
            ?>
                <div class="alert d-flex flex-column align-items-center justify-content-center text-center mx-auto" 
                style="background-color: black; color: red; font-size: 1.2rem; height:300px; width: 100%;">
                <p class="mb-2 fs-1">No Record Found</p>
                <i class="fa-solid fa-circle-xmark fa-3x"></i>
            <?php
            } else {
            ?>
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th><!-- for action buttonsd --></th>
                            <th><!-- for buy button --></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($product = $all_products->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $product['id'] ?></td>
                                <td class="text-center"><?= $product['product_name'] ?></td>
                                <td class="text-center"><?= $product['price'] ?></td>
                                <td class="text-center"><?= $product['quantity'] ?></td>
                                <td>
                                    <!- action buttons ->
                                    <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-outline-warning" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="../actions/delete-product.php?id=<?= $product['id'] ?>" class="btn btn-outline-danger" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    if ($product['quantity'] > 0) {
                                    ?>
                                        <a href="buy-product.php?id=<?= $product['id'] ?>" class="btn btn-outline-success" title="Buy">
                                            <i class="fa-solid fa-cash-register"></i>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
            <?php
                        }
            }
            ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal本体 -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="d-flex justify-content-end p-2">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-header border-0 justify-content-center">
                    <h1 class="modal-title text-primary" id="addProductModalLabel"><i class="fa-solid fa-boxes-stacked"></i> Add Product</h1>
                </div>
                <div class="modal-body">
                    <form action="../actions/add-product.php" method="post">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="product_name" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- script cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>