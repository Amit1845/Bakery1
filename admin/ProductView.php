<?php
session_start();
if(isset($_SESSION["ad_session"]))
{

	include("header.php");
	include("../conn.php");
	$result=mysqli_query($con,"select * from product");
	?>
	<section class="w3ls-bnrbtm py-5" id="about">
		<div class="container py-xl-5 py-lg-3">
			<div class="row pb-5">
				<div class="col-lg-12">
	<?php
	echo "<center><h1>Product Data</h1>";
	echo "<br> </br>";
	echo "<table border=5>";
	echo "<tr>";
	$no=mysqli_num_fields($result);
	for ($i=0;$i<$no;$i++)
	{
		$fieldinfo=mysqli_fetch_field_direct($result,$i);
		echo "<th>".$fieldinfo->name."</th>";
	}
	echo "<th>Update</th>
			<th>Delete</th></tr>";
	while($row=mysqli_fetch_array($result))
	{
		echo"<tr>";
		echo "<td>".htmlspecialchars($row[0])."</td>";
		echo "<td>".htmlspecialchars($row[1])."</td>";
		echo "<td>".htmlspecialchars($row[2])."</td>";
		echo "<td>".htmlspecialchars($row[3])."</td>";
		echo "<td>".htmlspecialchars($row[4])."</td>";
		echo "<td><img src='../".$row[5]."' height=50px width=50px></td>";
		echo "<td><a href='ProductUpdate.php?id=$row[0]'>Update</a></td>";
		echo "<td><a href='ProductDelete.php?id=$row[0]'>Delete</a></td>";
		echo "</tr>";
	}
	echo"</table>";
	echo "</center>";
?>
<a href="ProductAdd.php"><h3 align="center">Add new</h3></a>

</div>
</div>
</div>
</section>
<?php
	include("footer.php");
	}	
	else
		echo "<script>window.location='Login.php';</script>";
?>