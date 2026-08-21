<?php
	include "header.php";
	$cid = (int)($_REQUEST["cid"] ?? 0);
	$stmt = mysqli_prepare($con, "SELECT * FROM product WHERE cat_id = ?");
	mysqli_stmt_bind_param($stmt, "i", $cid);
	mysqli_stmt_execute($stmt);
	$pro = mysqli_stmt_get_result($stmt);
?>

<!-- blog -->
	<section class="blog py-5" id="blog">
		<div class="container py-xl-5 py-lg-3">
		<?php
		if(mysqli_num_rows($pro)>0)
		{
		?>
			<h3 class="title-w3ls text-center text-bl mb-5">Products</h3>
			<div class="row">
				<!-- blog grid -->
				<?php
				while($rpro=mysqli_fetch_array($pro))
				{
				?>
				<div class="col-lg-4 col-md-6 px-md-2">
					<div class="card">
						<div class="card-header p-0 position-relative">
							<a href="ProductDetail.php?id=<?php echo $rpro[0]; ?>">
								<img class="card-img-bottom" src="<?php echo $rpro[5]; ?>" alt="Card image cap">
							</a>
						</div>
						<div class="card-body">
							<h5 class="blog-title card-title">
								<a href="ProductDetail.php?id=<?php echo $rpro[0]; ?>"><?php echo htmlspecialchars($rpro[2]); ?></a>
							</h5>
							<h5 class="mb-1">Price :<?php echo $rpro[4]; ?></h5>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
			<?php
			}
			else
			{
			?>
			<h3 class="title-w3ls text-center text-bl mb-5">No Products Available</h3>
			<?php
			}
			?>
		</div>
	</section>
	<!-- //blog -->



<?php
	include "footer.php";
?>