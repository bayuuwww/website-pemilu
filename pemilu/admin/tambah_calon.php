<?php
include '../config/db.php';
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "../uploads/" . $foto;

    if (move_uploaded_file($tmp, $path)) {
        $conn->query("INSERT INTO calon (nama, visi, misi, foto) VALUES ('$nama', '$visi', '$misi', '$foto')");
        echo "<div class='alert alert-success'>Calon berhasil ditambahkan. <a href='index.php' class='btn btn-primary'>Kembali</a></div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal upload foto.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Calon</title>
    
    <!-- Link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
        }

        .form-group input, .form-group textarea {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Calon</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="visi">Visi</label>
                <textarea id="visi" name="visi" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="misi">Misi</label>
                <textarea id="misi" name="misi" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Tambah Calon</button>
        </form>
    </div>

    <!-- Bootstrap JS dan dependensinya -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
