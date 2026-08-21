<?php
// Database connection using environment variables (Railway-friendly).
// Falls back to local XAMPP-style defaults for local development.

$db_host = getenv('MYSQLHOST') ?: 'localhost';
$db_port = getenv('MYSQLPORT') ?: 3306;
$db_user = getenv('MYSQLUSER') ?: 'root';
$db_pass = getenv('MYSQLPASSWORD') ?: '';
$db_name = getenv('MYSQLDATABASE') ?: 'bakery_shop_db';

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name, (int)$db_port);

if (!$con) {
    // Don't leak DB details to visitors in production.
    error_log('DB connection failed: ' . mysqli_connect_error());
    die('Database connection failed. Please try again later.');
}
