<?php
require_once 'config.php';
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if(isset($_POST['tambah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_teknisi = $_POST['id_teknisi'];
    $merk = $_POST['merk_perangkat'];
    $keluhan = $_POST['keluhan'];
    $biaya = $_POST['biaya'];
    $status = $_POST['status'];
    
    mysqli_query($conn, "INSERT INTO servis (id_pelanggan, id_teknisi, merk_perangkat, keluhan, biaya, status) 
                         VALUES ('$id_pelanggan', '$id_teknisi', '$merk', '$keluhan', '$biaya', '$status')");
    header("Location: servis.php");
}


if(isset($_GET['selesai'])) {
    $id = $_GET['selesai'];
    mysqli_query($conn, "UPDATE servis SET status='Selesai' WHERE id_servis=$id");
    header("Location: servis.php");
}

$data = mysqli_query($conn, "SELECT servis.*, pelanggan.nama, teknisi.nama_teknisi 
                              FROM servis 
                              JOIN pelanggan ON servis.id_pelanggan = pelanggan.id_pelanggan
                              JOIN teknisi ON servis.id_teknisi = teknisi.id_teknisi
                              ORDER BY servis.tanggal_masuk DESC");

$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$teknisi = mysqli_query($conn, "SELECT * FROM teknisi");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Servis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Data Servis HP</h1>
            <a href="dashboard.php" class="btn-back">← Kembali</a>
        </div>
        
        <div class="form-card">
            <h3>Tambah Servis</h3>
            <form method="POST">
                <select name="id_pelanggan" required>
                    <option value="">Pilih Pelanggan</option>
                    <?php while($p = mysqli_fetch_assoc($pelanggan)): ?>
                        <option value="<?= $p['id_pelanggan'] ?>"><?= $p['nama'] ?> - <?= $p['no_hp'] ?></option>
                    <?php endwhile; ?>
                </select>
                
                <select name="id_teknisi" required>
                    <option value="">Pilih Teknisi</option>
                    <?php 
                    mysqli_data_seek($teknisi, 0);
                    while($t = mysqli_fetch_assoc($teknisi)): ?>
                        <option value="<?= $t['id_teknisi'] ?>"><?= $t['nama_teknisi'] ?></option>
                    <?php endwhile; ?>
                </select>
                
                <input type="text" name="merk_perangkat" placeholder="Merk Perangkat" required>
                <textarea name="keluhan" placeholder="Keluhan / Kerusakan" rows="3" required></textarea>
                <input type="number" name="biaya" placeholder="Biaya Servis" required>
                
                <select name="status">
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                </select>
                
                <button type="submit" name="tambah">Simpan Servis</button>
            </form>
        </div>
        
        <div class="table-card">
            <h3>Daftar Servis</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>Pelanggan</th><th>Teknisi</th><th>Perangkat</th><th>Keluhan</th><th>Biaya</th><th>Status</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($data)): ?>
                    <tr>
                        <td><?= $row['id_servis'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['nama_teknisi'] ?></td>
                        <td><?= $row['merk_perangkat'] ?></td>
                        <td><?= $row['keluhan'] ?></td>
                        <td>Rp <?= number_format($row['biaya'], 0, ',', '.') ?></td>
                        <td class="status <?= strtolower($row['status']) ?>"><?= $row['status'] ?></td>
                        <td>
                            <?php if($row['status'] == 'Proses'): ?>
                                <a href="?selesai=<?= $row['id_servis'] ?>" class="btn-selesai">Selesai</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/servis.js"></script>
    <script src="js/global.js"></script>
</body>
</html>