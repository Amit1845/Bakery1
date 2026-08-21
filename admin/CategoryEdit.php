 <?php
session_start();
if(isset($_SESSION["ad_session"]))
{

include("../conn.php");
if(isset($_REQUEST["cat_upd"]))
{
	/*if($_FILES["img"]["name"]=="")
		$path=$_REQUEST["old_img"];
	else
	{
		$path="upload/".$_FILES["img"]["name"];
		move_uploaded_file($_FILES["img"]["tmp_name"],"../".$path);
		unlink("../".$_REQUEST["old_img"]);
	}*/
	$nm  = trim($_REQUEST["name"]);
	$cid = (int)$_REQUEST["catid"];
	$stmt = mysqli_prepare($con, "UPDATE category SET cat_name = ? WHERE cat_id = ?");
	mysqli_stmt_bind_param($stmt, "si", $nm, $cid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	echo "<script>window.location='CategoryView.php';</script>";
}
}	
	else
		echo "<script>window.location='Login.php';</script>";

?>