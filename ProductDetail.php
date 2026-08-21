<?php
	include "header.php";
	$pid = (int)($_REQUEST["id"] ?? 0);
	$stmt = mysqli_prepare($con, "SELECT * FROM product WHERE pro_id = ?");
	mysqli_stmt_bind_param($stmt, "i", $pid);
	mysqli_stmt_execute($stmt);
	$pro = mysqli_stmt_get_result($stmt);
	$r = mysqli_fetch_row($pro);
	if (!$r) {
		echo "<p style='text-align:center;padding:40px;'>Product not found.</p>";
		include "footer.php";
		exit;
	}

?>
<section class="w3ls-bnrbtm py-5" id="about">
		<div class="container py-xl-5 py-lg-3">
			<div class="row pb-5">
				<div class="col-lg-6">
					<img class="img-fluid" src="<?php echo $r[5]; ?>" alt="">
				</div>
				<div class="col-lg-6 pl-lg-5 abou-right-w3layuts mt-lg-0 mt-5">
					<h3 class="mb-4"><?php echo htmlspecialchars($r[2]); ?></h3>
					<p>Price : <?php echo $r[4]; ?></p>
					<p>Description : <?php echo htmlspecialchars($r[3]); ?></p>
					
				
				<br />
				<br />
				
			
			</div>
				
				<div class="row flex-row-reverse border-top pt-lg-5 pt-sm-4 pt-2 mt-lg-5 mt-sm-4 mt-2">
				<div class="col-lg-6">
					
				</div>
				<div class="col-lg-6 abou-right-w3layuts mt-5">
</div>
</div>				
			</div>
			
		</div>
	</section>
	<?php include "footer.php"; ?>