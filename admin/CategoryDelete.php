<?php 
session_start();
if(isset($_SESSION["ad_session"]))
{

include("header.php");
		include("../conn.php");
		 
		 $cid = (int)$_REQUEST["id"];
		 $stmt = mysqli_prepare($con, "DELETE FROM category WHERE cat_id = ?");
		 mysqli_stmt_bind_param($stmt, "i", $cid);
		 mysqli_stmt_execute($stmt);
		 mysqli_stmt_close($stmt);
	
	echo "<script>window.location='CategoryView.php';</script>";
}
	else	 

	echo "<script>window.location='Login.php';</script>";
?>	

	<?php

		include("footer.php");
		
?>	 
		 
		 
		 
		 
	