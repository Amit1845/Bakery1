<?php 
session_start();
if(isset($_SESSION["ad_session"]))
{
include("header.php"); ?>
<br />
<br />

<section class="w3ls-bnrbtm py-5" id="about">
		<div class="container py-xl-5 py-lg-3">
			<div class="row pb-5">
				<div class="col-lg-12">
<center>
		<form name="form1" method="post" enctype="multipart/form-data">
		<h1>Backery Data</h1>
		<table border="3">
			<tr>
				<td>name  </td>
				<td><input type="text" name="name" /></td>
			</tr>
			
			
			<tr align="center">
				<td colspan="2"><input type="submit" name="sub" value="submit" /></td>
			</tr>
		</table>
		
		</form>
	</center>
	</div>
	</div>
	</div>
	</section>

<?php
	include("footer.php");
	include("../conn.php");
	
	if(isset($_POST["sub"]))
	{
		$nm = trim($_POST["name"]);

		if ($nm !== '') {
			$stmt = mysqli_prepare($con, "INSERT INTO category (cat_id, cat_name) VALUES (NULL, ?)");
			mysqli_stmt_bind_param($stmt, "s", $nm);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			echo "<script>window.location='CategoryView.php';</script>";
		} else {
			echo "<script>alert('Please enter a category name.'); window.history.back();</script>";
		}
	}
}	
	else
		echo "<script>window.location='Login.php';</script>";
?>