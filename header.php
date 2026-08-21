<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Baking Restaurants Category Bootstrap Responsive website Template | Home :: W3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Baking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link
		href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese"
		rel="stylesheet">
	<!-- //Web-Fonts -->
</head>

<body>
	<!-- header -->
	<header id="home">
		<!-- top-bar -->
		<div class="top-bar py-2 bg-li">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-5 top-social-w3pvt-am mt-lg-1 mb-md-0 mb-1 text-lg-left text-center">
						<div class="row">
							<div class="col-xl-4 col-6 header-top_w3layouts border-right">
								<p class="text-bl">
									<span class="fa fa-map-marker mr-2"></span>Rajkot, Gujarat
								</p>
							</div>
							<div class="col-xl-4 col-6 header-top_w3layouts text-md-right">
								<p class="text-bl">
									<span class="fa fa-phone mr-2"></span>+91 9316545332
								</p>
							</div>
							<div class="col-xl-4"></div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-7 top-social-w3pvt-am mt-lg-0 mt-2">
						<div class="row">
							<div class="col-6 top-w3layouts">
								<!-- search -->
								<?php /*?><div class="search-w3layouts">
									<form action="#" method="post" class="search-bottom-wthree d-flex my-md-0 my-2">
										<input class="search col" type="search" placeholder="Search Here..."
											required="">
										<button  class="form-control btn col-2" type="submit"><span
												class="fa fa-search"></span></button>
									</form>
								</div><?php */?>
								<!-- //search -->
							</div>
							<div class="col-6 border-left mt-lg-1 socila-brek text-md-right text-center">
								<!-- social icons -->
								<?php /*?><ul class="top-right-info">
									<li>
										<p class="par-so mr-3">Follow Us:</p>
									</li>
									<li class="mr-1 soci-effe facebook">
										<a href="../#">
											<span class="fa fa-facebook-f"></span>
										</a>
									</li>
									<li class="mr-1 soci-effe twitter">
										<a href="../#">
											<span class="fa fa-twitter"></span>
										</a>
									</li>
									<li class="mr-1 soci-effe google-plus">
										<a href="../#">
											<span class="fa fa-google-plus"></span>
										</a>
									</li>
									<li class="soci-effe dribbble">
										<a href="../#">
											<span class="fa fa-dribbble"></span>
										</a>
									</li>
								</ul><?php */?>
								<!-- //social icons -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- //top-bar -->

	<!-- header 2 -->
	<!-- navigation -->
	<div class="main-top">
		<div class="container d-lg-flex justify-content-between align-items-center">
			<!-- logo -->
			<h1 class="logo-style-res float-left">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" alt="" class="img-fluid logo-img mt-1">Baking
				</a>
			</h1>
			<!-- //logo -->
			<!-- nav -->
			<div class="nav_w3ls mx-lg-auto">
				<nav>
					<label for="drop" class="toggle">Menu</label>
					<input type="checkbox" id="drop" />
					<ul class="menu mx-lg-auto">
						<li><a href="index.php" class="active">Home</a></li>
						<li><a href="About.php">About Us</a></li>
						<li>
							<!-- First Tier Drop Down -->
							<label for="drop-2" class="toggle toogle-2">Categories <span class="fa fa-angle-down"
									aria-hidden="true"></span>							</label>
							<a href="../#">Categories <span class="fa fa-angle-down" aria-hidden="true"></span></a>
							<input type="checkbox" id="drop-2" />
							<ul>
								<?php
								$cat=mysqli_query($con,"select * from category");
								while($rcat=mysqli_fetch_array($cat))
								{
								?>
								<li><a href="Product.php?cid=<?php echo $rcat[0]; ?>" class="drop-text"><?php echo $rcat[1]; ?></a></li>
								<?php
								}
								?>
								<!--<li><a href="#chefs" class="drop-text">Our Chef's</a></li>
								<li><a href="Blog.php" class="drop-text">Blog Posts</a></li>
								<li><a href="#services" class="drop-text">Services</a></li>
								<li><a href="Achievements.php" class="drop-text">Achievements</a></li>
								<li><a href="Reviews.php" class="drop-text">Reviews</a></li>
								<li><a href="#subscribe" class="drop-text">Subscribe</a></li>-->
							</ul>
						</li>
						<li><a href="gallary.php">Gallery</a></li>
						<li><a href="Feedback.php">Feedback</a></li>
						

					</ul>
				</nav>
			</div>
			<!-- //nav -->
			<!-- dwn -->
			<?php /*?><div class="text-center">
				<a href="#subscribe" class="login-button-2 text-uppercase text-wh mt-lg-0 mt-2">Shop Online </a>
			</div><?php */?>
			<!-- //dwn -->
		</div>
	</div>
	<!-- //navigation -->
	<!-- //header 2 -->

	<!-- banner slider -->
	<div id="homepage-slider" class="st-slider">
		<input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
		<input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
		<input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
		<input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
		