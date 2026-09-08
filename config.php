<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cuci_motor";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) die("Koneksi database gagal: " . mysqli_connect_error());
mysqli_set_charset($conn, "utf8mb4");

function e($str) {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}
?>