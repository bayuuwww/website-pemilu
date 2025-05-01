<?php
include '../config/db.php';
session_start();

if ($_SESSION['role'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$calon_id = $_POST['calon_id'];

// Cek apakah user sudah memilih
$cek_vote = $conn->query("SELECT * FROM vote WHERE user_id = $user_id");
if ($cek_vote->num_rows == 0) {
    // Insert vote
    $conn->query("INSERT INTO vote (user_id, calon_id) VALUES ($user_id, $calon_id)");
    header("Location: index.php");
} else {
    echo "Anda sudah melakukan voting.";
}
?>
