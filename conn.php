<?php
// Database connection using environment variables (Railway-friendly).
// Falls back to local XAMPP-style defaults for local development.

$db_host = getenv('MYSQLHOST') ?: 'localhost';
$db_port = getenv('MYSQLPORT') ?: '3306';
$db_user = getenv('MYSQLUSER') ?: 'root';
$db_pass = getenv('MYSQLPASSWORD') ?: '';
$db_name = getenv('MYSQLDATABASE') ?: 'bakery_shop_db';

$debug = getenv('APP_DEBUG') === '1' || true; // TEMP: force diagnostics until deployment issue is resolved

mysqli_report(MYSQLI_REPORT_OFF);

$con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name, (int)$db_port);

if (!$con) {
    http_response_code(500);
    error_log("DB connect failed: host=$db_host port=$db_port db=$db_name err=" . mysqli_connect_error());

    $env_status = '';
    foreach (array('MYSQLHOST', 'MYSQLPORT', 'MYSQLUSER', 'MYSQLPASSWORD', 'MYSQLDATABASE') as $v) {
        $val = getenv($v);
        $shown = ($v === 'MYSQLPASSWORD')
            ? (strlen($val) > 0 ? '(hidden, length ' . strlen($val) . ')' : '<b>EMPTY</b>')
            : "<code>" . htmlspecialchars($val === false ? '' : $val) . "</code>";
        $env_status .= "<li><code>$v</code>: " . ($val === false ? '<b>NOT SET</b>' : $shown) . "</li>";
    }

    $all_names = array();
    foreach (array_merge(array_keys($_SERVER), array_keys($_ENV)) as $k) {
        if (stripos((string)$k, 'mysql') !== false || stripos((string)$k, 'sql') !== false) {
            $all_names[] = (string)$k;
        }
    }
    $all_names = array_unique($all_names);
    sort($all_names);

    $marker = getenv('TEST_MARKER');
    echo "<h1>Database connection failed</h1>"
       . "<h3>Environment variables on this service:</h3><ul>$env_status</ul>"
       . "<p>Control variable <code>TEST_MARKER</code>: " . ($marker === false ? '<b>NOT SET</b>' : '<code>' . htmlspecialchars($marker) . '</code>') . "</p>"
       . "<h3>All env var names containing 'sql':</h3>"
       . (empty($all_names) ? '<p><b>NONE FOUND</b> — your variables are not reaching this container.</p>'
                            : '<ul><li><code>' . implode('</code></li><li><code>', array_map('htmlspecialchars', $all_names)) . '</code></li></ul>');
    if ($debug) {
        echo "<p>Using: host=<code>" . htmlspecialchars($db_host) . "</code>"
           . " port=<code>" . htmlspecialchars($db_port) . "</code>"
           . " user=<code>" . htmlspecialchars($db_user) . "</code>"
           . " db=<code>" . htmlspecialchars($db_name) . "</code></p>"
           . "<p>Raw error: " . htmlspecialchars(mysqli_connect_error()) . "</p>";
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
    echo "<h1>Connected to MySQL, but tables are missing</h1>"
       . "<p>The database <code>" . htmlspecialchars($db_name) . "</code> exists but its tables were never imported.</p>"
       . "<p><b>Fix:</b> import <code>bakery_shop_db_railway_split.sql</code> into the Railway MySQL database"
       . " (Data tab &rarr; Query/Import, or connect with a GUI client / mysql CLI using the Connect details).</p>";
    if ($debug) {
        echo "<p>Raw error: " . htmlspecialchars(mysqli_error($con)) . "</p>";
    }
    exit;
}
