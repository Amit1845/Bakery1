<?php
session_start();
if (isset($_SESSION["ad_session"])) {
    include("header.php");
    include("../conn.php");

    $fid = (int)$_REQUEST["id"];
    $stmt = mysqli_prepare($con, "DELETE FROM feedback WHERE fb_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $fid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>window.location='FeedbackView.php';</script>";
    include("footer.php");
} else {
    echo "<script>window.location='Login.php';</script>";
}
