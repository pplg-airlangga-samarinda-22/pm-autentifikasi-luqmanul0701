<?php
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id'];
    $sql = "SELECT * FROM petugas WHERE id_petugas=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();

    // var_dump($row);
    $nama = $row['nama_petugas'];
    $username = $row['username'];
    $password = $row['password'];
    $telepon = $row['telp'];
    $level = $row['level'];
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telp'];
    $level = $_POST['level'];
    $sql = "UPDATE petugas SET nama_petugas=?, telp=?, level=? WHERE id_petugas=?";
    $row = $koneksi->execute_query($sql, [$nama, $telepon, $level, $id]);

    if ($row) {
        header("location:../petugas.php");
    } else {
        echo "<script>alert('Gagal memperbarui petugas</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Petugas</title>
</head>

<body>
    <h1>Edit Petugas</h1>
    <form action="" method="post">
        <div class="form-">
            <label for="level">Level Akses</label>
            <select name="level" id="level">
                <option value="admin" <?= ($level == 'admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="petugas" <?= ($level == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
            </select>
        </div>
        <div class="form-item">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?= $nama ?>">
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" value="<?= $telepon ?>">
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= $username ?>">
            <button type="submit">Batal</button>
        </div>
    </form>
</body>

</html>