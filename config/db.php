<?php
$host = getenv('MYSQLHOST');
$port = getenv('MYSQLPORT');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQL_ROOT_PASSWORD');
$db   = getenv('MYSQLDATABASE');

if (!$host || !$port || !$user || !$db) {
    die('Environment variables for database connection are not set properly.');
}

$conn = new mysqli($host, $user, $pass, $db, (int)$port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
