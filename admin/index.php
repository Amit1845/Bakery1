<?php
	session_start();
	if(isset($_SESSION["ad_session"]))
	{
	include("header.php");
?>
	<section class="w3ls-bnrbtm py-5" id="about">
		<div class="container py-xl-5 py-lg-3">
			<div class="row pb-5">
				<div class="col-lg-6">
					<img class="img-fluid" src="../images/ab.jpg" alt="">
				</div>
				<div class="col-lg-6 pl-lg-5 abou-right-w3layuts mt-lg-0 mt-5">
					<h3 class="mb-4">Welcome to Our Baking Website</h3>
					<p>A bakery is an establishment that produces and sells flour-based food baked in an oven such as bread, cookies, cakes, pastries, and pies.
						</p>
				</div>
			</div>
			<div class="row flex-row-reverse border-top pt-lg-5 pt-sm-4 pt-2 mt-lg-5 mt-sm-4 mt-2">
				<div class="col-lg-6">
					<img class="img-fluid mt-5" src="../images/ab2.jpg" alt="">
				</div>
				<div class="col-lg-6 abou-right-w3layuts mt-5">
					<h3 class="mb-4">About Quality of Our Products</h3>
					<p>A bakery is an establishment that produces and sells flour-based food baked in an oven such ... The bakers began to prepare bread at home in an oven, using mills to grind grain into the ... They can also offer in-store baking and basic cake decoration. .... </p>
				</div>
			</div>
		</div>
	</section>
	<!-- //about -->

<?php /*?>	<!-- team -->
	<section class="teams py-5" id="chefs">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title-w3ls text-center text-wh mb-5">Our Best Chef's</h3>
			<div class="row text-center">
				<div class="col-lg-4">
					<div class="team-gd">
						<img src="../images/t1.jpg" class="img-fluid" alt="user-image">
						<div class="team-info mt-4">
							<h3 class="mb-2"><span class="sub-tittle-team">Chef 01</span> Marian Dupre</h3>
							<p>Donec consequat sapien ut leo cursus rhoncus</p>
							<ul class="social_section_1info list-unstyled pt-2 mt-4">
								<li class="d-inline facebook">
									<a href="../#"><span class="fa fa-facebook mr-1"></span>facebook</a>
								</li>
								<li class="d-inline twitter">
									<a href="../#"><span class="fa fa-twitter mr-1"></span>twitter</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mt-lg-0 mt-5">
					<div class="team-gd">
						<img src="../images/t2.jpg" class="img-fluid" alt="user-image">
						<div class="team-info mt-4">
							<h3 class="mb-2"><span class="sub-tittle-team">Chef 02</span> Judy Crouse</h3>
							<p>Donec consequat sapien ut leo cursus rhoncus</p>
							<ul class="social_section_1info list-unstyled pt-2 mt-4">
								<li class="d-inline google">
									<a href="../#"><span class="fa fa-google-plus mr-1"></span>google</a>
								</li>
								<li class="d-inline linkedin">
									<a href="../#"><span class="fa fa-linkedin mr-1"></span>linkedin</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mt-lg-0 mt-5">
					<div class="team-gd">
						<img src="../images/t3.jpg" class="img-fluid" alt="user-image">
						<div class="team-info mt-4">
							<h3 class="mb-2"><span class="sub-tittle-team">Chef 03</span> Ruth Chase</h3>
							<p>Donec consequat sapien ut leo cursus rhoncus</p>
							<ul class="social_section_1info list-unstyled pt-2 mt-4">
								<li class="d-inline facebook">
									<a href="../#"><span class="fa fa-facebook mr-1"></span>facebook</a>
								</li>
								<li class="d-inline twitter">
									<a href="../#"><span class="fa fa-twitter mr-1"></span>twitter</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //team -->
<?php */?>
	
	
	
<?php
	include("footer.php");
	}	
	else
		echo "<script>window.location='Login.php';</script>";
?>