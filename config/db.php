<?php
$host = "mysql.railway.internal"; // ambil dari Plugin MySQL → Host
$port = 3306;
$user = "root";                               // dari Plugin MySQL
$pass = "PabwqmFOeawHLuZkCEWHSJdCveLGDfnh";   // dari Plugin MySQL
$db   = "railway";                            // dari Plugin MySQL

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
