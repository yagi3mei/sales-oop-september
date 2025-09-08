<nav class="navbar navbar-expand" style="margin-bottom: 80px;">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <i class="fa-solid fa-house fa-2x"></i>
        </a>

        <div class="mx-auto">
            <span class="navbar-text fw-bold fs-4">
                Welcome, <?= $_SESSION['full_name'] ?>
            </span>
        </div>

        <form action="../actions/logout.php" method="post" class="d-flex">
            <button class="text-danger bg-transparent border-0">
                <i class="fa-solid fa-user-xmark fa-2x"></i> <!-- fa-lg / fa-2x -->
            </button>
        </form>
    </div>
</nav>
