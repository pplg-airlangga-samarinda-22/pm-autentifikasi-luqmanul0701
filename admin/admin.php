<?php
session_start();
require_once "koneksi.php";
if (empty($_SESSION['id_petugas'])) {
    header("location:admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pelaporan Pengaduan</title>
</head>

<body>
    <h1>Selamat Datang Di Aplikasi Pengaduan Masyarakat</h1>
    <nav>
        <a href="admin.php">Dashboard</a>
        <a href="aduan.php">Aduan</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>

</html>