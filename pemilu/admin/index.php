<?php
include '../config/db.php';
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Pemilu</title>
    
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    <!-- Link ke Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Dashboard Admin</h2>

        <p class="text-center">
            <a href="tambah_calon.php" class="btn btn-primary">Tambah Calon</a>
            <a href="hasil.php" class="btn btn-info">Hasil Voting</a>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </p>

        <h4>Selamat datang, Admin</h4>
        <p>Di sini Anda dapat mengelola calon dan melihat hasil voting.</p>
    </div>

    <!-- Bootstrap JS dan dependensinya -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
