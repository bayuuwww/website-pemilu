<?php
include 'config/db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pemilu</title>
    
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Link ke Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Selamat Datang di Sistem Pemilu</h2>

        <?php if (isset($_SESSION['username'])): ?>
            <p class="text-center">
                <strong>Halo, <?php echo $_SESSION['username']; ?></strong>
            </p>
            <p class="text-center">
                <a href="user/vote.php" class="btn btn-success">Mulai Voting</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </p>
        <?php else: ?>
            <p class="text-center">
                <a href="login.php" class="btn btn-primary">Login</a>
            </p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS dan dependensinya -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
