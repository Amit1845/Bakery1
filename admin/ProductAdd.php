<?php 
session_start();
if(isset($_SESSION["ad_session"]))
{
include "header.php"; 
include("../conn.php");
include("../upload_helper.php");
$selcat=mysqli_query($con,"select * from category")
?>

<center>
		<form name="form1" method="post" enctype="multipart/form-data">
		<h1>Backery Data</h1>
		<table border="3">
	
			<tr>
				<td>cat_id</td>
				<td>
					<select name="cat_id">
					<?php
					while($cat=mysqli_fetch_array($selcat))
					{
						?>
							<option value="<?php echo $cat[0]; ?>"><?php echo $cat[1]; ?></option>
						<?php
					}
					?>
					</select>
				</td>
			</tr>

			<tr>
				<td>pro_name  </td>
				<td><input type="text" name="pro_name" /></td>
			</tr>
			
			<tr>
				<td>pro_detail</td>
				<td><input type="text" name="pro_detail" /></td>
			</tr>
			
			<tr>
				<td>pro_price</td>
				<td><input type="text" name="pro_price" /></td>
			</tr>

			<tr>
				<td>pro_image</td>
				<td><input type="file" name="pro_img" /></td>
			</tr>
			
			<tr align="center">
				<td colspan="2"> <input type="submit" name="sub" value="submit" /></td>
			</tr>
		</table>
		
		</form>
</center>
	</body>
</html>
<?php
	include "footer.php";
	
	
	if(isset($_POST["sub"]))
	{
		$cid = (int)$_POST["cat_id"];
		$nm  = trim($_POST["pro_name"]);
		$dt  = trim($_POST["pro_detail"]);
		$pr  = (float)$_POST["pro_price"];
		$path = handle_product_image_upload("pro_img", __DIR__ . "/../upload/");

		if ($path && $nm !== '') {
			$stmt = mysqli_prepare($con, "INSERT INTO product (pro_id, cat_id, pro_name, pro_detail, pro_price, pro_image) VALUES (NULL, ?, ?, ?, ?, ?)");
			mysqli_stmt_bind_param($stmt, "issds", $cid, $nm, $dt, $pr, $path);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			echo "<script>window.location='ProductView.php';</script>";
		} else {
			echo "<script>alert('Please provide a valid name and a jpg/png/gif/webp image under 5MB.'); window.history.back();</script>";
		}
	}
}	
	else
		echo "<script>window.location='Login.php';</script>";

?>