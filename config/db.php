<?php
$host = getenv('MYSQLHOST');
$port = getenv('MYSQLPORT');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQL_ROOT_PASSWORD');
$db   = getenv('MYSQLDATABASE');

var_dump($host, $port, $user, $pass, $db);
exit;  // Hentikan eksekusi untuk melihat hasil var_dump
