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
    <title>Hasil Voting</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Hasil Voting</h2>
        <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Calon</th>
                    <th>Jumlah Suara</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT calon.nama, COUNT(vote.id) as jumlah_vote FROM calon LEFT JOIN vote ON calon.id = vote.calon_id GROUP BY calon.id");

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama']}</td>
                            <td>{$row['jumlah_vote']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
