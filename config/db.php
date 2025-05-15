<?php
$host = getenv("MYSQLHOST") ?: "containers-us-west-123.railway.app";
$port = getenv("MYSQLPORT") ?: 3306;
$user = getenv("MYSQLUSER") ?: "root";
$pass = getenv("MYSQL_ROOT_PASSWORD") ?: "PabwqmFOeawHLuZkCEWHSJdCveLGDfnh";
$db   = getenv("MYSQLDATABASE") ?: "railway";

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    var_dump($host, $port, $user, $pass, $db);
    exit;
    die("Koneksi gagal: " . $conn->connect_error);
}
