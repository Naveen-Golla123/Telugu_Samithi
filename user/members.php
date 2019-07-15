<?php
session_start();
include("../config.php");
if(!(isset($_SESSION['email'])))
{
  header("location:../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>తెలుగు సమితి | Gallery</title>

	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Relief Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	<link href="../css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="../css/fontawesome-all.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
	
	<style>
	.pmd-tabs li a{
	color:white;
	padding:10px 70px 10px 70px;
	}
	
	
	.pmd-card{
		border:1px solid black;
		background:white;
	}
	
	
	</style>
</head>

<body>

	<div class="top_header" id="home">
				<!-- Fixed navbar -->
				<nav class="navbar navbar-default navbar-fixed-top">
			<div class="nav_top_fx_w3layouts_agileits">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					    aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="logo_wthree_agile" style="margin-top:30px">
						<h1>
							<a class="navbar-brand" href="index.php">
								<i class="fas fa-heart" aria-hidden="true"></i> తెలుగు సమితి
							</a>
						</h1>
					</div>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<div class="nav_right_top">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="index.php">Home</a>
							</li>
							<li>
								<a class="scroll" href="gallery.php">Gallery</a>
							</li>
							<li>
								<a class="scroll" href="members.php">Members</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a class="scroll" href="events.php">Sankranti Smambaralu</a>
									</li>
									<li>
										<a class="scroll" href="events.php">TPL</a>
									</li>
								</ul>
							</li>
							<li>
								<a class="scroll" href="services.php">Fourm</a>
							</li>
							<li>
								<a class="scroll" href="poll.php">Poll</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-user"></span>
									<?php 
										$email=$_SESSION["email"];
										$query="SELECT * FROM users WHERE email='$email'";
                    					$data=mysqli_query($conn,$query);
										$res=mysqli_fetch_array($data);
										echo $res["lname"];
									?>
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a class="scroll" href="profile.php">Profile</a>
									</li>
									<li>
										<a class="scroll" href="logout.php">Log Out</a>
									</li>
								</ul>
							</li>
							

						</ul>
					</div>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
		<div class="clearfix"></div>
	</div>
	<!-- banner -->
	
	<!--/gallery-->
	<div class="banner_bottom proj" id="gallery">
		<div class="wrap_view">
			<h3 class="tittle_w3_agileinfo">Members</h3>
			
			<!--with background tab example -->
			<div class="card pmd-card">
			<div class="pmd-tabs pmd-tabs pmd-fill" style="background:rgba(255,102,0,1);">
		<ul class="nav nav-tabs" role="tablist">
	        <li role="presentation" class="nav-item"><a href="#faculty" class="nav-link active" aria-controls="default" role="tab" data-toggle="tab">Faculty</a></li>
	        <li class="nav-item"><a class="nav-link" href="#alumini" aria-controls="fixed" role="tab" data-toggle="tab">Alumini</a></li>
	        <li class="nav-item"><a class="nav-link" href="#2k15" aria-controls="scrollable" role="tab" data-toggle="tab">2k15</a></li>
			<li class="nav-item"><a class="nav-link" href="#2k16" aria-controls="scrollable" role="tab" data-toggle="tab">2k16</a></li>
			<li class="nav-item"><a class="nav-link" href="#2k17" aria-controls="scrollable" role="tab" data-toggle="tab">2k17</a></li>
			<li class="nav-item"><a class="nav-link" href="#2k18" aria-controls="scrollable" role="tab" data-toggle="tab">2k18</a></li>
	    </ul>
	</div>
	<div class="card-body">
	    <div class="tab-content">
			<!--faculty-->
	        <div role="tabpanel" class="tab-pane active" id="faculty">
					<!--Table-->
							<table class="table table-hover table-fixed">

							<!--Table head-->
							<thead>
							<tr>
								<th>Name</th>
								<th>Branch</th>
								<th>Email</th>
								<th>Mobile No</th>
								<th>From</th>
							</tr>
							</thead>
							<!--Table head-->
							<tbody>

							<?php
								$query="SELECT `fname`, `lname`, `email`, `dob`, `branch`, `batch`, `place`, `roll`, `whatsapp`, `mobile` FROM `users` WHERE batch='faculty' OR batch='Faculty'";
								$res=mysqli_query($conn,$query);
								while($data=mysqli_fetch_array($res)){
									echo '<tr>
									<td>'.$data["fname"].' '.$data["lname"].'</td>
									<td>'.$data["branch"].'</td>
									<td>'.$data["email"].'</td>
									<td>'.$data["whatsapp"].'</td>
									<td>'.$data["place"].'</td>
									</tr>';
								};

							?>
							<!--Table body-->
							
							
							
							</tbody>
							<!--Table body-->

							</table>
							<!--Table-->
			
			
			</div>
	        <div role="tabpanel" class="tab-pane" id="alumini">
											<!--Table-->
							<table class="table table-hover table-fixed">

									<!--Table head-->
									<thead>
									<tr>
										<th>Name</th>
										<th>Branch</th>
										<th>Batch</th>
										<th>Email</th>
										<th>Mobile No</th>
										<th>From</th>
									</tr>
									</thead>
									<!--Table head-->
									<tbody>

									<?php
										$query="SELECT `fname`, `lname`, `email`, `dob`, `branch`, `batch`, `place`, `roll`, `whatsapp`, `mobile`,`alumini` FROM `users` WHERE alumini='YES'";
										$res=mysqli_query($conn,$query);
										while($data=mysqli_fetch_array($res)){
											echo '<tr>
											<td>'.$data["fname"].' '.$data["lname"].'</td>
											<td>'.$data["branch"].'</td>
											<td>'.$data["batch"].'</td>
											<td>'.$data["email"].'</td>
											<td>'.$data["whatsapp"].'</td>
											<td>'.$data["place"].'</td>
											</tr>';
										};

									?>
									<!--Table body-->



									</tbody>
									<!--Table body-->

									</table>
									<!--Table-->
			
			</div>
	        <div role="tabpanel" class="tab-pane" id="2k15">
							<table class="table table-hover table-fixed">

								<!--Table head-->
								<thead>
								<tr>
									<th>Name</th>
									<th>Branch</th>
									<th>Email</th>
									<th>Mobile No</th>
									<th>From</th>
								</tr>
								</thead>
								<!--Table head-->
								<tbody>

								<?php
									$query="SELECT `fname`, `lname`, `email`, `dob`, `branch`, `batch`, `place`, `roll`, `whatsapp`, `mobile` FROM `users` WHERE batch='2k15' OR batch='2K15'";
									$res=mysqli_query($conn,$query);
									while($data=mysqli_fetch_array($res)){
										echo '<tr>
										<td>'.$data["fname"].' '.$data["lname"].'</td>
										<td>'.$data["branch"].'</td>
										<td>'.$data["email"].'</td>
										<td>'.$data["whatsapp"].'</td>
										<td>'.$data["place"].'</td>
										</tr>';
									};

								?>
								<!--Table body-->



								</tbody>
								<!--Table body-->

</table>
<!--Table-->
			</div>
	    	<div role="tabpanel" class="tab-pane" id="2k16">
											<!--Table-->
							<table class="table table-hover table-fixed">

										<!--Table head-->
										<thead>
										<tr>
											<th>Name</th>
											<th>Branch</th>
											<th>Email</th>
											<th>Mobile No</th>
											<th>From</th>
										</tr>
										</thead>
										<!--Table head-->
										<tbody>

										<?php
											$query="SELECT `fname`, `lname`, `email`, `dob`, `branch`, `batch`, `place`, `roll`, `whatsapp`, `mobile` FROM `users` WHERE batch='2k16' OR batch='2K16'";
											$res=mysqli_query($conn,$query);
											while($data=mysqli_fetch_array($res)){
												echo '<tr>
												<td>'.$data["fname"].' '.$data["lname"].'</td>
												<td>'.$data["branch"].'</td>
												<td>'.$data["email"].'</td>
												<td>'.$data["whatsapp"].'</td>
												<td>'.$data["place"].'</td>
												</tr>';
											};

										?>
										<!--Table body-->



										</tbody>
										<!--Table body-->

										</table>
										<!--Table-->
			
			</div>
			<div role="tabpanel" class="tab-pane" id="2k17">

												<!--Table-->
							<table class="table table-hover table-fixed">

									<!--Table head-->
									<thead>
									<tr>
										<th>Name</th>
										<th>Branch</th>
										<th>Email</th>
										<th>Mobile No</th>
										<th>From</th>
									</tr>
									</thead>
									<!--Table head-->
									<tbody>

									<?php
										$query="SELECT `fname`, `lname`, `email`, `dob`, `branch`, `batch`, `place`, `roll`, `whatsapp`, `mobile` FROM `users` WHERE batch='2k17' OR batch='2K17'";
										$res=mysqli_query($conn,$query);
										while($data=mysqli_fetch_array($res)){
											echo '<tr>
											<td>'.$data["fname"].' '.$data["lname"].'</td>
											<td>'.$data["branch"].'</td>
											<td>'.$data["email"].'</td>
											<td>'.$data["whatsapp"].'</td>
											<td>'.$data["place"].'</td>
											</tr>';
										};

									?>
									<!--Table body-->



									</tbody>
									<!--Table body-->

									</table>
									<!--Table-->
			
			</div>
			<div role="tabpanel" class="tab-pane" id="2k18">

				<!--Table-->
				<table class="table table-hover table-fixed">

						<!--Table head-->
						<thead>
						<tr>
							<th>Name</th>
							<th>Branch</th>
							<th>Email</th>
							<th>Mobile No</th>
							<th>From</th>
						</tr>
						</thead>
						<!--Table head-->
						<tbody>

						<?php
							$query="SELECT `fname`, `lname`, `email`, `dob`, `branch`, `batch`, `place`, `roll`, `whatsapp`, `mobile` FROM `users` WHERE batch='2k18' OR batch='2K18'";
							$res=mysqli_query($conn,$query);
							while($data=mysqli_fetch_array($res)){
								echo '<tr>
								<td>'.$data["fname"].' '.$data["lname"].'</td>
								<td>'.$data["branch"].'</td>
								<td>'.$data["email"].'</td>
								<td>'.$data["whatsapp"].'</td>
								<td>'.$data["place"].'</td>
								</tr>';
							};

						?>
						<!--Table body-->



						</tbody>
						<!--Table body-->

						</table>
						<!--Table-->
			
			</div>
		</div>
	</div> 
</div><!--with background tab example end -->
			
		</div>
	</div>


	<!--//gallery-->

	
	<!-- footer -->
	<div class="footer" id="contact" style="padding:50px;">
	<center><h3 style="color:white;">Follow Us on</h3></center><br>
		<div class="footer_inner_info_wthree_agileits">
			<!--/tabs-->
		<!--	<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Contact Info</li>
						<li>Send Message</li>
						<li>View Map</li>
					</ul>
					<div class="resp-tabs-container">
						
						<div class="tab1">
							<div class="tab-info">

								<div class="address">
									<div class="col-md-4 address-grid">
										<div class="address-left">
											<div class="dodecagon f1">
												<div class="dodecagon-in f1">
													<div class="dodecagon-bg f1">
														<span class="fas fa-phone-volume" aria-hidden="true"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="address-right">
											<h6>Phone Number</h6>
											<p>+1 234 567 8901,+1 234 567 8901</p>

										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-4 address-grid">
										<div class="address-left">
											<div class="dodecagon f1">
												<div class="dodecagon-in f1">
													<div class="dodecagon-bg f1">
														<span class="far fa-envelope" aria-hidden="true"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="address-right">
											<h6>Email Address</h6>
											<p>Email :
												<a href="mailto:example@email.com"> mail@example.com</a>
											</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-4 address-grid">
										<div class="address-left">
											<div class="dodecagon f1">
												<div class="dodecagon-in f1">
													<div class="dodecagon-bg f1">
														<span class="fas fa-map-marker-alt" aria-hidden="true"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="address-right">
											<h6>Location</h6>
											<p>Broome St, NY 10002,California, USA.

											</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						
						<div class="tab2">

							<div class="tab-info">
								<div class="contact_grid_right">
									<h6>Please fill this form to contact with us.</h6>
									<form action="#" method="post">
										<div class="contact_left_grid">
											<input type="text" name="Name" placeholder="Name" required="">
											<input type="email" name="Email" placeholder="Email" required="">

											<input type="text" name="Telephone" placeholder="Telephone" required="">
											<input type="text" name="Subject" placeholder="Subject" required="">
											<textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
											<input type="submit" value="Submit">
											<input type="reset" value="Clear">
											<div class="clearfix"> </div>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						<div class="tab3">

							<div class="tab-info">
								<div class="contact-map">

									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783"
									    class="map" style="border:0" allowfullscreen=""></iframe>
								</div>

							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div> -->
			<!--//tabs-->
			<div class="clearfix"> </div>
			
			<ul class="social-nav model-3d-0 footer-social social two">
				<li>
					<a href="https://www.facebook.com/groups/195997783756911/" class="facebook" target="_blank">
						<div class="front" style="border-radius:38px;">
							<i class="fab fa-facebook-f" aria-hidden="true" style="font-size:35px;border-radius:50px;margin-top:7px;"></i>
						</div>

					</a>
				</li>
				
				<li>
					<a href="https://www.instagram.com/bit_telugu_samithi/?hl=en" class="instagram" target="_blank">
						<div class="front" style="border-radius:38px;">
							<i class="fab fa-instagram" aria-hidden="true" style="font-size:35px;border-radius:50px;margin-top:7px;"></i>
						</div>

					</a>
				</li>
				<li>
					<a href="#" class="pinterest" >
						<div class="front" style="background:red;border-radius:38px;">
							<i class="fab fa-youtube-square" aria-hidden="true" style="font-size:35px;border-radius:50px;margin-top:7px;"></i>
						</div>

					</a>
				</li>
			</ul>
			
		</div>
	</div>
	<!-- //footer -->
	<script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<!-- script for responsive tabs -->
	<script src="../js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!--// script for responsive tabs -->
	<script src="../js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<script type="text/javascript" src="../js/all.js"></script>
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>

	<!-- js -->
	<script type="text/javascript" src="../js/simplyCountdown.js"></script>
	<link href="../css/simplyCountdown.css" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
		$('#simply-countdown-losange').simplyCountdown({
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--js-->
	<!--/tooltip -->
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip({
				trigger: 'manual'
			}).tooltip('show');
		});

		// $( window ).scroll(function() {   
		// if($( window ).scrollTop() > 10){  // scroll down abit and get the action   
		$(".progress-bar").each(function () {
			each_bar_width = $(this).attr('aria-valuenow');
			$(this).width(each_bar_width + '%');
		});

		//  }  
		// });
	</script>
	<!--//tooltip -->
	<!-- Smooth-Scrolling-JavaScript -->
	<script type="text/javascript" src="../js/easing.js"></script>
	<script type="text/javascript" src="../js/move-top.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll, .navbar li a, .footer li a").click(function (event) {
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //Smooth-Scrolling-JavaScript -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>


	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>

	<!-- jQuery-Photo-filter-lightbox-Gallery-plugin -->
	<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
	<script src="../js/jquery.quicksand.js" type="text/javascript"></script>
	<script src="../js/script.js" type="text/javascript"></script>
	<script src="../js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->
	
	



</body>

</html>