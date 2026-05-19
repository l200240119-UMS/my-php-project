<?php
$host   = 'mysql://root:DDVAmTdpsKFwnZfsRwuBdBaAyhqxEbhB@ballast.proxy.rlwy.net:50118/railway'; 
$user   = 'root';
$pass   = 'DDVAmTdpsKFwnZfsRwuBdBaAyhqxEbhB';
$dbname = 'railway';
$port   = '3306'; 

$conn = mysqli_connect($host, $user, $pass, $dbname, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();
?>