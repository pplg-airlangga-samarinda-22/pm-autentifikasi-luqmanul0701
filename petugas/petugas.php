<?php
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Petugas</title>
</head>

<body>
    <h1>Data Petugas</h1>
    <a href="index.php">Kembali</a> <br>
    <a href="petugas-form.php">Tambah Petugas Baru</a>
    <table>
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = "SELECT * FROM petugas";
            $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= ++$row['nama_petugas'] ?></td>
                    <td><?= ++$row['telp'] ?></td>
                    <td><?= ++$row['username'] ?></td>
                    <td><?= ++$row['level'] ?></td>
                    <td>
                        <a href="petugas-edit.php?id<?= $row['id_petugas'] ?>">Edit</a>
                        <a href="petugas-hapus.php?id<?= $row['id_petugas'] ?>">hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Kembali</a>
</body>

</html>