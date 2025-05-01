<?php
include '../config/db.php';
session_start();
if ($_SESSION['role'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Cek apakah user sudah memilih dan calon yang dipilih
$cek_vote = $conn->query("SELECT * FROM vote WHERE user_id = $user_id");
$already_voted = $cek_vote->num_rows > 0;
$selected_calon_id = null;

// Jika user sudah memilih, ambil calon yang dipilih
if ($already_voted) {
    $vote_data = $cek_vote->fetch_assoc();
    $selected_calon_id = $vote_data['calon_id'];
}

$result = $conn->query("SELECT * FROM calon");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Voting</title>
    
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    <!-- Link ke Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Pilih Calon</h2>

        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../uploads/<?php echo $row['foto']; ?>" class="img-fluid" alt="Foto Calon">
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                            <p><strong>Visi:</strong> <?php echo $row['visi']; ?></p>
                            <p><strong>Misi:</strong> <?php echo $row['misi']; ?></p>

                            <p><strong>Jumlah Suara:</strong> 
                            <?php
                            $vote_count = $conn->query("SELECT COUNT(*) as vote_count FROM vote WHERE calon_id = {$row['id']}");
                            $vote_count = $vote_count->fetch_assoc();
                            echo $vote_count['vote_count'];
                            ?>
                            </p>

                            <!-- Tampilkan tanda jika user sudah memilih calon ini -->
                            <?php if ($already_voted): ?>
                                <?php if ($row['id'] == $selected_calon_id): ?>
                                    <p class="text-danger">Anda sudah memilih <?php echo $row['nama']; ?>!</p>
                                <?php endif; ?>
                            <?php else: ?>
                                <!-- Tombol pilih hanya muncul jika user belum memilih -->
                                <form method="POST" action="vote.php">
                                    <input type="hidden" name="calon_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-success">Pilih</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <p class="text-center"><a href="../logout.php" class="btn btn-danger">Logout</a></p>
    </div>

    <!-- Bootstrap JS dan dependensinya -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
