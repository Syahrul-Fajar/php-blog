<?php
$host = getenv("MYSQLHOST") ?: "containers-us-west-xxx.railway.app"; // fallback jika dijalankan secara lokal
$port = getenv("MYSQLPORT") ?: 3306;
$user = getenv("MYSQLUSER") ?: "root";
$pass = getenv("MYSQL_ROOT_PASSWORD") ?: "PabwqmFOeawHLuZkCEWHSJdCveLGDfnh";
$db   = getenv("MYSQL_DATABASE") ?: "railway";

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
