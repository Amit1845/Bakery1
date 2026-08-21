<?php
session_start();
if(isset($_SESSION["ad_session"]))
{

	include("header.php");
	include("../conn.php");
	$pid = (int)$_REQUEST["id"];
	$stmt = mysqli_prepare($con, "SELECT * FROM product WHERE pro_id = ?");
	mysqli_stmt_bind_param($stmt, "i", $pid);
	mysqli_stmt_execute($stmt);
	$selpro = mysqli_stmt_get_result($stmt);
	$r_pro = mysqli_fetch_row($selpro);
	if (!$r_pro) {
		echo "<script>alert('Product not found.'); window.location='ProductView.php';</script>";
		exit;
	}
?>
<center>
		<form name="form1" method="post" action="ProductEdit.php" enctype="multipart/form-data">
		<h1>Backery Data</h1>
		<br />
		<table border="3">
	
			<tr>
				<td>cat_id<?php echo $r_pro[1]; ?></td>
				<td>
					<select name="cat_id">
					<?php
						$selcat=mysqli_query($con,"select * from category");
					while($cat=mysqli_fetch_array($selcat))
					{
						?>
							<option <?php if($r_pro[1]==$cat[0])
							echo "selected"; ?> value="<?php echo $cat[0]; ?>"><?php echo $cat[1]; ?></option>
						<?php
					}
					?>
					</select>
				</td>
			</tr>

			<tr>
				<td>pro_name  </td>
				<td><input type="text" name="pro_name" value="<?php echo htmlspecialchars($r_pro[2]); ?>" /></td>
			</tr>
			
			<tr>
				<td>pro_detail</td>
				<td><input type="text" name="pro_detail" value="<?php echo htmlspecialchars($r_pro[3]); ?>" /></td>
			</tr>
			
			<tr>
				<td>pro_price</td>
				<td><input type="text" name="pro_price" value="<?php echo $r_pro[4]; ?>" /></td>
			</tr>

			<tr>
				<td>pro_image</td>
				<td>
				<input type="file" name="pro_img" />
				<input type="hidden" name="old_img" value="<?php echo $r_pro[5]; ?>" />
				<input type="hidden" name="proid" value="<?php echo $r_pro[0]; ?>" />	
				<img src="../<?php echo $r_pro[5]; ?>" height="220px" width="220px" />
				</td>
			</tr>
			
			<tr align="center">
				<td colspan="2"> <input type="submit" name="pro_upd" value="submit" /></td>
			</tr>
		</table>
		
		</form>
</center>
<br />
<br />
<?php
	include("footer.php");
	}	
	else
		echo "<script>window.location='Login.php';</script>";

?>