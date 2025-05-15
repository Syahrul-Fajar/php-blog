<?php
$host = getenv('MYSQLHOST') ?: ($_ENV['MYSQLHOST'] ?? ($_SERVER['MYSQLHOST'] ?? 'containers-us-west-123.railway.app'));
$port = getenv('MYSQLPORT') ?: ($_ENV['MYSQLPORT'] ?? ($_SERVER['MYSQLPORT'] ?? 3306));
$user = getenv('MYSQLUSER') ?: ($_ENV['MYSQLUSER'] ?? ($_SERVER['MYSQLUSER'] ?? 'root'));
$pass = getenv('MYSQL_ROOT_PASSWORD') ?: ($_ENV['MYSQL_ROOT_PASSWORD'] ?? ($_SERVER['MYSQL_ROOT_PASSWORD'] ?? 'your_password'));
$db   = getenv('MYSQLDATABASE') ?: ($_ENV['MYSQLDATABASE'] ?? ($_SERVER['MYSQLDATABASE'] ?? 'railway'));

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
