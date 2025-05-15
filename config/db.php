<?php
$host = getenv("MYSQLHOST");
$port = getenv("MYSQLPORT");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQL_ROOT_PASSWORD");
$db   = getenv("MYSQLDATABASE");

echo "<pre>";
var_dump($host, $port, $user, $pass, $db);
echo "</pre>";
exit;
?>
