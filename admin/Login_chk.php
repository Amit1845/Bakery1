<?php
session_start();
include "../conn.php";

if (isset($_REQUEST["ad_login"])) {
    $unm = trim($_REQUEST["unm"] ?? '');
    $psw = trim($_REQUEST["psw"] ?? '');

    $stmt = mysqli_prepare($con, "SELECT * FROM adminlogin WHERE name = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $unm);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $res = mysqli_fetch_assoc($result);

    $ok = false;
    if ($res) {
        // Supports both properly hashed passwords and legacy plaintext rows.
        if (password_verify($psw, $res['password'])) {
            $ok = true;
        } elseif (hash_equals($res['password'], $psw)) {
            $ok = true; // legacy plaintext match; consider re-hashing on next login
        }
    }

    if ($ok) {
        session_regenerate_id(true);
        $_SESSION["ad_session"] = $res['name'];
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "<script>window.location='Login.php';</script>";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "<script>window.location='Login.php';</script>";
}
