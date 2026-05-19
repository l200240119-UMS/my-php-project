<?php
require_once 'config.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Servis HP</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
.menu-card:active {
    background-color: #4CAF50;
    transform: scale(0.98);
}

}
</style>
<body>
    <div class="container">
        <div class="header">
            <h1>Aplikasi Servis HP</h1>
            <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>
        
        <div class="menu-grid">
            <a href="pelanggan.php" class="menu-card" class ="menu-card:active">
                <h3>Data Pelanggan</h3>
                <p>Kelola data pelanggan</p>
            </a>
            
            <a href="teknisi.php" class="menu-card" class ="menu-card:active">
                <h3>Data Teknisi</h3>
                <p>Kelola data teknisi</p>
            </a>
             <a href="servis.php" class="menu-card" class ="menu-card:active">
                <h3>Data Servis</h3>
                <p>Kelola transaksi servis</p>
            </a>
           
        </div>
    </div>

    <script src="js/global.js"></script>
</body>
</html>