<?php
session_start();
include("../config.php");
$_SESSION["data"]=NULL;
if(!(isset($_SESSION['email'])))
{
  header("location:../index.php");
}

if(isset($_POST["post"])){
	$content=mysqli_real_escape_string($conn, $_POST["content"]);
	$query="SELECT * FROM `users` WHERE email='$_SESSION[email]'";
	$res=mysqli_query($conn,$query);
	$data=mysqli_fetch_array($res);
	
	$name=$data["fname"].' '.$data["lname"];
  date_default_timezone_set('Asia/Kolkata');
  $time=date("h:i a");
	$date=date("d M Y");

	$query="INSERT INTO `posts`(`content`, `time`, `date`, `likes`, `name`, `batch`) VALUES ('$content','$time','$date',0,'$name','$data[batch]')";
	mysqli_query($conn,$query);
	header("location:services.php");

}
if(isset($_POST["comment"])){
	$content=mysqli_real_escape_string($conn, $_POST["content"]);
	$commentid=(int)mysqli_real_escape_string($conn, $_POST["id"]);
	$query="SELECT * FROM `users` WHERE email='$_SESSION[email]'";
	$res=mysqli_query($conn,$query);
	$data=mysqli_fetch_array($res);
	
	$name=$data["fname"].' '.$data["lname"];
  	date_default_timezone_set('Asia/Kolkata');
  	$time=date("h:i a");
	$date=date("d M Y");
	$query="INSERT INTO `comments`( `commentid`, `date`, `time`, `content`, `name`) VALUES ($commentid,'$date','$time','$content','$name')";
	mysqli_query($conn,$query);
	header("location:services.php");

	
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
</head>
<style>

body{
    margin-top:20px;
    background:#eee;
}

.timeline {
    list-style-type: none;
    margin: 0;
    padding: 0;
    position: relative
}

.timeline:before {
    content: '';
    position: absolute;
    top: 5px;
    bottom: 5px;
    width: 5px;
    background: #2d353c;
    left: 20%;
    margin-left: -2.5px
}

.timeline>li {
    position: relative;
    min-height: 50px;
    padding: 20px 0
}

.timeline .timeline-time {
    position: absolute;
    left: 0;
    width: 18%;
    text-align: right;
    top: 30px
}

.timeline .timeline-time .date,
.timeline .timeline-time .time {
    display: block;
    font-weight: 600
}

.timeline .timeline-time .date {
    line-height: 16px;
    font-size: 12px
}

.timeline .timeline-time .time {
    line-height: 24px;
    font-size: 20px;
    color: #242a30
}

.timeline .timeline-icon {
    left: 15%;
    position: absolute;
    width: 10%;
    text-align: center;
    top: 40px
}

.timeline .timeline-icon a {
    text-decoration: none;
    width: 20px;
    height: 20px;
    display: inline-block;
    border-radius: 20px;
    background: #d9e0e7;
    line-height: 10px;
    color: #fff;
    font-size: 14px;
    border: 5px solid #2d353c;
    transition: border-color .2s linear
}

.timeline .timeline-body {
    margin-left: 23%;
    margin-right: 17%;
    background: #fff;
    position: relative;
    padding: 20px 25px;
    border-radius: 6px
}

.timeline .timeline-body:before {
    content: '';
    display: block;
    position: absolute;
    border: 10px solid transparent;
    border-right-color: #fff;
    left: -20px;
    top: 20px
}

.timeline .timeline-body>div+div {
    margin-top: 15px
}

.timeline .timeline-body>div+div:last-child {
    margin-bottom: -20px;
    padding-bottom: 20px;
    border-radius: 0 0 6px 6px
}

.timeline-header {
    padding-bottom: 10px;
    border-bottom: 1px solid #e2e7eb;
    line-height: 30px
}

.timeline-header .userimage {
    float: left;
    width: 34px;
    height: 34px;
    border-radius: 40px;
    overflow: hidden;
    margin: -2px 10px -2px 0
}

.timeline-header .username {
    font-size: 16px;
    font-weight: 600
}

.timeline-header .username,
.timeline-header .username a {
    color: #2d353c
}

.timeline img {
    max-width: 100%;
    display: block
}

.timeline-content {
    letter-spacing: .25px;
    line-height: 18px;
    font-size: 13px
}

.timeline-content:after,
.timeline-content:before {
    content: '';
    display: table;
    clear: both
}

.timeline-title {
    margin-top: 0
}

.timeline-footer {
    background: #fff;
    border-top: 1px solid #e2e7ec;
    padding-top: 15px
}

.timeline-footer a:not(.btn) {
    color: #575d63
}

.timeline-footer a:not(.btn):focus,
.timeline-footer a:not(.btn):hover {
    color: #2d353c
}

.timeline-likes {
    color: #6d767f;
    font-weight: 600;
    font-size: 12px
}

.timeline-likes .stats-right {
    float: right
}

.timeline-likes .stats-total {
    display: inline-block;
    line-height: 20px
}

.timeline-likes .stats-icon {
    float: left;
    margin-right: 5px;
    font-size: 9px
}

.timeline-likes .stats-icon+.stats-icon {
    margin-left: -2px
}

.timeline-likes .stats-text {
    line-height: 20px
}

.timeline-likes .stats-text+.stats-text {
    margin-left: 15px
}

.timeline-comment-box {
    background: #f2f3f4;
    margin-left: -25px;
    margin-right: -25px;
    padding: 20px 25px
}

.timeline-comment-box .user {
    float: left;
    width: 34px;
    height: 34px;
    overflow: hidden;
    border-radius: 30px
}

.timeline-comment-box .user img {
    max-width: 100%;
    max-height: 100%
}

.timeline-comment-box .user+.input {
    margin-left: 44px
}

.lead {
    margin-bottom: 20px;
    font-size: 21px;
    font-weight: 300;
    line-height: 1.4;
}

.text-danger, .text-red {
    color: #ff5b57!important;
}
	</style>
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
			<h3 class="tittle_w3_agileinfo">Post Here</h3>
									<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
						<div class="container">
										<!-- begin timeline-icon -->
										<div class="timeline-icon">
												<a href="javascript:;">&nbsp;</a>
										</div>
										<!-- end timeline-icon -->
										<!-- begin timeline-body -->
										<center>
										<div class="timeline-body" style="width:700px;">
												<form action="services.php" method="POST" >
													<div class="form-group">
																<textarea class="form-control rounded-0" name="content" id="exampleFormControlTextarea1" rows="5" style="resize:none" required></textarea><br>
																<input class="btn btn-primary f-s-12 rounded-corner" style="background:rgba(255,102,0,0.9);width:70px;" type="submit" name="post" value="Post"/>
														</div>
													</form>
										</div>
									</center>
							<hr>
							<ul class="timeline">

							<?php
									$query="SELECT * FROM `posts` ORDER BY `id` DESC";
									$res=mysqli_query($conn,$query);
									while($data=mysqli_fetch_array($res)){
										
									

									echo '<li>
										<!-- begin timeline-time -->
										<div class="timeline-time">
												<span class="date">'.$data["date"].'</span>
												<span class="time">'.$data["time"].'</span>
										</div>
										<!-- end timeline-time -->
										<!-- begin timeline-icon -->
										<div class="timeline-icon">
												<a href="javascript:;">&nbsp;</a>
										</div>
										<!-- end timeline-icon -->
										<!-- begin timeline-body -->
										<div class="timeline-body">
												<div class="timeline-header">
													<span class="userimage"><img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt=""></span>
													<span class="username"><a href="javascript:;" style="font-size:18px;text-transform:capitalize">'.$data["name"].'</a><small></small></span>
													<span class="pull-right text-muted">'.$data["likes"].' Likes</span>
												</div>
												<div class="timeline-content">
													<p style="font-size:18px;">
													'.$data["content"].'
													</p>
												</div>
												<div class="timeline-footer">
													<a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3" style="font-size:10px;"></i> Like</a>
													 
												</div>
												<div class="timeline-comment-box">
													
													
															<form action="services.php" method="POST">
																<div class="fluid-container">
																<div class="row">
																<div class="col-md-8" style="display:inline-block;margin-right:0px;padding:0px;">
																		<input type="text" name="content" class="form-control rounded-corner" placeholder="Write a comment...">
																		<input type="hidden" name="id" value="'.$data["id"].'"/>
																		</div>
																		<div class="col-md-4" style="display:inline-block;margin-left:0px;padding:0px;">
																		<span class="input-group-btn p-l-10">
																		<input class="btn btn-primary f-s-12 rounded-corner"  style="background:rgba(255,102,0,0.9);border-radius:0px 5px 5px 0px;" type="submit" name="comment" value="Comment"/></span></div>
																</div>		
																</div>			
															</form>
															'; 
																$query="SELECT * FROM comments WHERE commentid=$data[id]";
																$comres=mysqli_query($conn,$query);
																while($comdata=mysqli_fetch_array($comres)) {
																	echo '<div><b><p style="display:inline-block;text-transform: capitalize;font-size:15px;">'.$comdata["name"].' </p></b>
																			<p style="display:inline-block;font-size:12px;margin-left:10px"> '.$comdata["time"].','.$comdata["date"].'</p>
																			<p style="font-size:14px;margin-left:10px;padding:0px;"> '.$comdata["content"].'</p></div>';
																	}
												
													
													echo '
															
													
												</div>
										</div>
										<!-- end timeline-body -->
									</li>';
										}
									?>
									


									
							</ul>
						</div>
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