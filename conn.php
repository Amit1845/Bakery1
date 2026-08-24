<?php
// Database connection using environment variables (Railway-friendly).
// Falls back to local XAMPP-style defaults for local development.
//
// Set APP_DEBUG=1 on a service to surface detailed DB errors on-screen
// when troubleshooting; keep it unset/0 in production.

$db_host = getenv('MYSQLHOST') ?: 'localhost';
$db_port = getenv('MYSQLPORT') ?: '3306';
$db_user = getenv('MYSQLUSER') ?: 'root';
$db_pass = getenv('MYSQLPASSWORD') ?: '';
$db_name = getenv('MYSQLDATABASE') ?: 'bakery_shop_db';

$debug = getenv('APP_DEBUG') === '1';

mysqli_report(MYSQLI_REPORT_OFF);

$con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name, (int)$db_port);

if (!$con) {
    http_response_code(500);
    error_log("DB connect failed: host=$db_host port=$db_port db=$db_name err=" . mysqli_connect_error());

    echo "<h1>Database connection failed</h1>"
       . "<p>We're having trouble reaching our database. Please try again shortly.</p>";
    if ($debug) {
        echo "<p>Raw error: " . htmlspecialchars(mysqli_connect_error()) . "</p>";
    }
    exit;
}

$tables_ok = true;
foreach (array('category', 'product', 'feedback', 'adminlogin') as $t) {
    $r = @mysqli_query($con, "SELECT 1 FROM `$t` LIMIT 1");
    if ($r === false) { $tables_ok = false; break; }
}

if (!$tables_ok) {
    http_response_code(500);
    error_log("DB connected but required tables are missing in $db_name");

    echo "<h1>Database not set up</h1>"
       . "<p>The database is reachable, but its tables haven't been imported yet.</p>";
    if ($debug) {
        echo "<p>Raw error: " . htmlspecialchars(mysqli_error($con)) . "</p>";
    }
    exit;
}
