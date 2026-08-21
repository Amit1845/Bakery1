<?php
	include "header.php";
	include "conn.php";
	$pro=mysqli_query($con,"select * from product ORDER BY pro_id DESC LIMIT 9");
?>


<!-- gallery -->
	<div class="gallery py-5" id="gallery">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title-w3ls text-center text-bl mb-5">Our Gallery</h3>
			<div class="row no-gutters">
				<?php
				while($r=mysqli_fetch_array($pro))
				{
				?>
				<div class="col-md-4 gallery-grid1">
					
						<img src="<?php echo $r[5]; ?>" alt=" " class="img-fluid" />
					</a>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<!-- gallery popups -->
		<!-- popup-->
		<?php /*?><div id="gal1" class="pop-overlay animate">
			<div class="popup">
				<img src="images/g1.jpg" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.
				</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div><?php */?>
		<!-- //popup -->
		<!-- popup-->
		<?php /*?><div id="gal2" class="pop-overlay animate">
			<div class="popup">
				<img src="images/g2.jpg" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.
				</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div><?php */?>
		<!-- //popup -->
		<!-- popup-->
		<?php /*?><div id="gal3" class="pop-overlay animate">
			<div class="popup">
				<img src="images/g3.jpg" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.
				</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div><?php */?>
		<!-- //popup3 -->
		<!-- popup-->
		<?php /*?><div id="gal4" class="pop-overlay animate">
			<div class="popup">
				<img src="images/g4.jpg" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.
				</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div><?php */?>
		<!-- //popup -->
		<!-- popup-->
		<?php /*?><div id="gal5" class="pop-overlay animate">
			<div class="popup">
				<img src="images/g5.jpg" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.
				</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div><?php */?>
		<!-- //popup -->
		<!-- popup-->
		<?php /*?><div id="gal6" class="pop-overlay animate">
			<div class="popup">
				<img src="images/g6.jpg" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat dolor.
				</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div><?php */?>
		<!-- //popup -->
		<!-- //gallery popups -->
	</div>
	<!-- //gallery -->

	
				
<?php
	include "footer.php";
?>