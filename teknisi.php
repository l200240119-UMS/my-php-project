<?php
require_once 'config.php';
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


if(isset($_POST['tambah'])) {
    $nama = $_POST['nama_teknisi'];
    mysqli_query($conn, "INSERT INTO teknisi (nama_teknisi) VALUES ('$nama')");
    header("Location: teknisi.php");
}

if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM teknisi WHERE id_teknisi=$id");
    header("Location: teknisi.php");
}

$data = mysqli_query($conn, "SELECT * FROM teknisi");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Teknisi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Data Teknisi</h1>
            <a href="dashboard.php" class="btn-back">← Kembali</a>
        </div>
        
        <div class="form-card">
            <h3>Tambah Teknisi</h3>
            <form method="POST">
                <input type="text" name="nama_teknisi" placeholder="Nama Teknisi" required>
                <button type="submit" name="tambah">Simpan</button>
            </form>
        </div>
        
        <div class="table-card">
            <h3>Daftar Teknisi</h3>
            <table>
                <thead><tr><th>ID</th><th>Nama Teknisi</th><th>Aksi</th></tr></thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($data)): ?>
                    <tr>
                        <td><?= $row['id_teknisi'] ?></td>
                        <td><?= $row['nama_teknisi'] ?></td>
                        <td><a href="?hapus=<?= $row['id_teknisi'] ?>" class="btn-hapus">Hapus</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/global.js"></script>
    <script src="js/teknisi.js"></script>
</body>
</html>