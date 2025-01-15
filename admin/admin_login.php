<?php
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_petugas = isset($_POST['id_petugas']) ? $_POST['id_petugas'] : ''; // defaultkan id_petugas menjadi string kosong jika tidak ada
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM petugas WHERE id_petugas=? AND username =? AND password=?";
    $stmt = $koneksi->prepare($sql); // lebih baik menggunakan prepare statement untuk menghindari SQL Injection
    $stmt->bind_param('sss', $id_petugas, $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        session_start();
        header("location:admin/admin.php");
    } else {
        echo "<script>alert('Gagal Login')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <form action="" method="post" class="form-login">
        <p>Silahkan Login</p>
        <div class="form-item">
            <label for="id_petugas">Id Petugas</label>
            <input type="text" name="id_petugas" id="id_petugas" required>
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
        <a href="admin/admin_regis.php">Register</a>
    </form>
</body>

</html>