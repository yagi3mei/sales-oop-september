<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div style="height: 100vh;>">
        <div class="row h-100 m-0">
            <div class="card w-50 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center">LOGIN</h1>
                </div>

                <div class="card-body">
                    <form action="../actions/login.php" method="post">
                        <!-- Username -->
                        <div class="row mb-3 align-items-center">
                            <label for="username" class="col-sm-3 col-form-label text-end">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" id="username" 
                                    class="form-control" 
                                    placeholder="USERNAME" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row mb-3 align-items-center">
                            <label for="password" class="col-sm-3 col-form-label text-end">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password" 
                                    class="form-control" 
                                    placeholder="PASSWORD" required>
                            </div>
                        </div>

                        <!-- Log in ボタン（Password の入力欄と同じ col-9 に配置） -->
                        <div class="row mb-3">
                            <div class="col-sm-3"> </div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary w-100">Log in</button>
                            </div>
                        </div>

                        <!-- Create Account ボタン（Log in の下で中央寄せ、小さめ） -->
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 d-flex justify-content-center">
                                <button type="button" class="btn btn-danger btn-sm px-4" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                    Create an Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header text-danger">
            <h1 class="modal-title w-100 text-center" id="createUserModalLabel"><i class="fa-solid fa-user-plus"></i> Registration</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../actions/register.php" method="post">
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first-name" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last-name" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>
                <row class="mb-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger w-100">Register</button>
                    </div>
                </row>
            </form>
        </div>
    </div>

    <!-- script cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>