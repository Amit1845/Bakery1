<?php
session_start();
if(isset($_SESSION["ad_session"]))
{

include("../conn.php");
include("../upload_helper.php");
if(isset($_REQUEST["pro_upd"]))
{
	$oldImg = $_REQUEST["old_img"];

	if (empty($_FILES["pro_img"]["name"])) {
		$path = $oldImg;
	} else {
		$newPath = handle_product_image_upload("pro_img", __DIR__ . "/../upload/");
		if ($newPath) {
			$path = $newPath;
			$oldFull = realpath(__DIR__ . "/../" . $oldImg);
			$uploadDir = realpath(__DIR__ . "/../upload/");
			// Only delete the old file if it actually lives inside upload/
			if ($oldFull && $uploadDir && strpos($oldFull, $uploadDir) === 0 && is_file($oldFull)) {
				unlink($oldFull);
			}
		} else {
			$path = $oldImg; // keep old image if new upload was invalid
		}
	}

	$cid   = (int)$_REQUEST["cat_id"];
	$nm    = trim($_REQUEST["pro_name"]);
	$dt    = trim($_REQUEST["pro_detail"]);
	$pr    = (float)$_REQUEST["pro_price"];
	$proid = (int)$_REQUEST["proid"];

	$stmt = mysqli_prepare($con, "UPDATE product SET cat_id=?, pro_name=?, pro_detail=?, pro_price=?, pro_image=? WHERE pro_id=?");
	mysqli_stmt_bind_param($stmt, "issdsi", $cid, $nm, $dt, $pr, $path, $proid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	echo "<script>window.location='ProductView.php';</script>";
}
}	
	else
		echo "<script>window.location='Login.php';</script>";

?>