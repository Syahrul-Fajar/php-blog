<?php
$host = getenv('MYSQLHOST');
$port = '3306';
$user = 'root';
$pass = 'PabwqmFOeawHLuZkCEWHSJdCveLGDfnh';
$db   = 'railway';

if (!$host || !$port || !$user || !$db) {
    die('Environment variables for database connection are not set properly.');
}

$conn = new mysqli($host, $user, $pass, $db, (int)$port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
