<?php
require_once 'config.php';
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if(isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    mysqli_query($conn, "INSERT INTO pelanggan (nama, no_hp) VALUES ('$nama', '$no_hp')");
    header("Location: pelanggan.php");
}

if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan=$id");
    header("Location: pelanggan.php");
}

$data = mysqli_query($conn, "SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Data Pelanggan</h1>
            <a href="dashboard.php" class="btn-back">← Kembali</a>
        </div>
        
        <!-- Form Tambah -->
        <div class="form-card">
            <h3>Tambah Pelanggan</h3>
            <form method="POST">
                <input type="text" name="nama" placeholder="Nama Pelanggan" required>
                <input type="tel" name="no_hp" placeholder="No. HP +62" required>
                <button type="submit" name="tambah">Simpan</button>
            </form>
        </div>
        
    
        <div class="table-card">
            <h3>Daftar Pelanggan</h3>
            <table>
                <thead>
                    <tr><th>ID</th><th>Nama</th><th>No. HP</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($data)): ?>
                    <tr>
                        <td><?= $row['id_pelanggan'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['no_hp'] ?></td>
                        <td>
                            <a href="?hapus=<?= $row['id_pelanggan'] ?>" class="btn-hapus">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/global.js"></script>
    <script src="js/pelanggan.js"></script>
</body>
</html>