<?php 
session_start();
if(isset($_SESSION["ad_session"]))
{

include("header.php");
		include("../conn.php");
$pid = (int)$_REQUEST["id"];

$stmt = mysqli_prepare($con, "SELECT pro_image FROM product WHERE pro_id = ?");
mysqli_stmt_bind_param($stmt, "i", $pid);
mysqli_stmt_execute($stmt);
$delsel = mysqli_stmt_get_result($stmt);

if ($r = mysqli_fetch_row($delsel)) {
	$imgFull = realpath(__DIR__ . "/../" . $r[0]);
	$uploadDir = realpath(__DIR__ . "/../upload/");
	if ($imgFull && $uploadDir && strpos($imgFull, $uploadDir) === 0 && is_file($imgFull)) {
		unlink($imgFull);
	}

	$del = mysqli_prepare($con, "DELETE FROM product WHERE pro_id = ?");
	mysqli_stmt_bind_param($del, "i", $pid);
	mysqli_stmt_execute($del);
	mysqli_stmt_close($del);
}

echo "<script>window.location='ProductView.php';</script>";
include("footer.php"); 
}	
	else
		echo "<script>window.location='Login.php';</script>";

?>
