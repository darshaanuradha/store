<?php
require_once 'application/database.php';
$page = $_GET['page'];
?>

<?php include 'presentation/partiels/header.php'; ?>

<body class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <?php include 'presentation/partiels/navbar.php'; ?>

    <!-- Main content -->
    <main class="flex-1">
        <?php include 'presentation/pages/' . ($page ?: 'home') . '.php'; ?>
    </main>

    <!-- Footer -->
    <?php include 'presentation/partiels/footer.php'; ?>
</body>

</html>