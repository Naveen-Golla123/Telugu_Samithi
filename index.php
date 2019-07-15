<?php
include("config.php");
session_start();
if(isset($_POST['register']))
{

	$fname=mysqli_real_escape_string($conn, $_POST["firstname"]);
	$lname=mysqli_real_escape_string($conn, $_POST["lastname"]);
	$email=mysqli_real_escape_string($conn, $_POST["email"]);
	$dob=mysqli_real_escape_string($conn, $_POST["dob"]);
	$branch=mysqli_real_escape_string($conn, $_POST["branch"]);
	$batch=mysqli_real_escape_string($conn, $_POST["Batch"]);
	$place=mysqli_real_escape_string($conn, $_POST["place"]);
	$roll=mysqli_real_escape_string($conn, $_POST["roll"]);
	$whatsapp=mysqli_real_escape_string($conn, $_POST["mobile1"]);
	$mobile=mysqli_real_escape_string($conn, $_POST["mobile2"]);
	$password=mysqli_real_escape_string($conn, $_POST["password"]);
	$conpasword=mysqli_real_escape_string($conn, $_POST["conpassword"]);
	if(!($password==$conpasword)){
		echo '<script>alert("Password not matched!");</script>';
		}else{
			$password= md5($password);
			$query="SELECT * FROM users WHERE email='$email'";
			
			$res=mysqli_query($conn,$query);
			echo mysqli_num_rows($res);
			if(mysqli_num_rows($res)>0){
						echo '<script>alert("user already exists");</script>';
						
			}else{
			$query = "INSERT INTO users (fname,lname,email,dob,branch,batch,place,roll,whatsapp,mobile,password) VALUES('$fname', '$lname','$email','$dob','$branch','$batch','$place','$roll','$whatsapp','$mobile','$password')";
			if(mysqli_query($conn, $query))  
			{  
				echo '<script>alert("Registered Successfully");</script>';
				
				
			}  
		}

		}
}

if(isset($_POST['login']))
{
		$email=mysqli_real_escape_string($conn, $_POST["email"]);
		$password=mysqli_real_escape_string($conn, $_POST["password"]);
		$password=md5($password);
		$query="SELECT * FROM users WHERE (email='$email') AND (password='$password') ";
		$res=mysqli_query($conn,$query);
		echo '<script>alert("Login failed")'.mysqli_num_rows($res).'</script>';
		if(mysqli_num_rows($res)>0){
			$data=mysqli_fetch_array($res);
	if($data["auth"]==1){
				$_SESSION["email"]=$email;
        
				header("location:user/index.php");
				
			}else{
				echo '<script>alert("User not yet apporved")</script>';
				

			}
		
				
        
    }
    else{
			echo '<script>alert("incorrect credentials")</script>';
       
       
       }
}
?>



<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" href="images/titlelogo.jpg" />
	<title>తెలుగు సమితి | Home</title>
	
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
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
	<!--my css style-->
	<style>
	.btn-outline-warning{
			width:140px;
			height:48px;
			color:white;
			outline:none;
			border-radius:15px;
			font-size:20px;
			background:rgba(255, 102,0,1);
	}
	
	.btn-outline-warning:hover{
			width:140px;
			height:48px;
			color:white;
			outline:none;
			font-size:20px;
			border: 2px solid rgba(255, 102,0,1);
			border-radius:15px;
			background:rgba(255, 102,0,0);
	}
	.modal-header, .modal-header h4, .close {
		background-color: rgba(255, 102,50,1);
		color:white !important;
		text-align: center;
		font-size: 30px;
	}
	.modal-footer {
		background-color: rgba(255, 102,0,1);
	}
	#shiva
{
	height: 100px;
	
	-moz-border-radius: 50px;
	-webkit-border-radius: 50px;
	border-radius: 50px;
	margin:5px;
	display:inline-block;

}
.count
{
	width:100px;
  line-height: 100px;
  color:white;
  margin-left:30px;
  font-size:60px;
}
.tag
{
	width:100px;
  line-height: 100px;
  color:white;
  margin-left:30px;
  font-size:30px;
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
								<a class="scroll" href="#about">About Us</a>
							</li>
							<li>
									<a href="#myModalreg" data-toggle="modal" > Register</a>
							</li>
							<li>
									<a href="#myModal" data-toggle="modal" > Login</a>
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
	<div class="banner_top">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
		<!--	<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1" class=""></li>
				<li data-target="#myCarousel" data-slide-to="2" class=""></li>
				<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			</ol> -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<div class="container">
					
						<div class="carousel-caption">
							<h3>Unity is strength</h3>
							
							<!-- <div class="bnr-button" id="myBtnlo" style="display:inline-block;padding:10px;">
								<button  class="btn btn-outline-warning myBtnlo" id="myBtnlo">Login</button>
							</div>
							
							<div class="bnr-button" id="myBtnlo" style="display:inline-block;padding:10px;">
								<button  class="btn btn-outline-warning myBtnreg" id="myBtnreg">Register</button>
							</div> -->
							

						</div>
				
					</div>
				</div>
				<div class="item item2">
					<div class="container">
				
						<div class="carousel-caption">
							<h3>Unity is strength</h3>
							
							<!-- <div class="bnr-button" id="myBtnlo" style="display:inline-block;padding:10px;">
								<button  class="btn btn-outline-warning myBtnlo" id="myBtnlo">Login</button>
							</div>
							
							<div class="bnr-button" id="myBtnlo" style="display:inline-block;padding:10px;">
								<button  class="btn btn-outline-warning myBtnreg" id="myBtnreg">Register</button>
							</div> -->
							

						</div>
						
					</div>
				</div>
				<div class="item item3">
					<div class="container">
					
						<div class="carousel-caption">
							<h3>Unity is strength</h3>
							
							<!-- <div class="bnr-button" id="myBtnlo" style="display:inline-block;padding:10px;">
								<button  class="btn btn-outline-warning myBtnlo" id="myBtnlo">Login</button>
							</div>
							
							<div class="bnr-button" id="myBtnlo" style="display:inline-block;padding:10px;">
								<button  class="btn btn-outline-warning myBtnreg" id="myBtnreg">Register</button>
							</div> -->
							

						</div>
						
					</div>
				</div>
				<div class="item item4">
					<div class="container">
					
						<div class="carousel-caption">
							<h3>Unity is strength</h3>
							
							<!-- <div class="bnr-button" id="myBtnlo" style="display:inline-block;padding:10px;">
								<button  class="btn btn-outline-warning myBtnlo" id="myBtnlo">Login</button>
							</div>
							
							<div class="bnr-button" id="myBtnlo" style="display:inline-block;padding:10px;">
								<button  class="btn btn-outline-warning myBtnreg" id="myBtnreg">Register</button>
							</div>
							 -->

						</div>
						
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="fa fa-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="fa fa-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<!-- The Modal -->
		</div>
	</div>
	<!--//banner -->
	<div class="banner_bottom donate-log" style="padding:0px;">
		<div class="donate-inner">

		<!--	<div class="col-md-6 donate-f-login">
				<div class="donate-log-in book-form">
					<h2>Login Now</h2>
					<form action="#" method="post">
						<input type="text" name="roll" placeholder="Roll No" required />
						<input type="password" name="Password" class="password" placeholder="Password" required />
						
						<div class="check-box two">
							<input name="chekbox" type="checkbox" id="brand1" value="">
							<label for="brand1">
								<span></span>Remember Me.</label>
						</div>
						<input type="submit" value="Login">
					</form>
				</div>
			</div> -->
			
			 <!-- Modal Login -->
						<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">
				
						<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header" style="padding:20px 50px;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
						</div>
						<div class="modal-body" style="padding:40px 50px;">
						<form role="form" action="index.php" method="POST" id="login">
						<div class="form-group">
						  <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
						  <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
						</div>
						<div class="form-group">
						  <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
						  <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
						</div>
						<div class="checkbox">
						  <label><input type="checkbox" value="" checked>Remember me</label>
						</div>
						  <button type="submit" name='login' class="btn btn-success btn-block" style="align:center;font-size:17px;"><span class="glyphicon glyphicon-on"></span> Login</button>
						</form>
						</div>
				  </div>
				  
				</div>
			  </div> 
  <!--/modal Login-->
  <!--Modal Register-->
						<div class="modal fade" id="myModalreg" role="dialog">
						<div class="modal-dialog">
				
						<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header" style="padding:20px 50px;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><span class="glyphicon glyphicon-lock"></span> Register</h4>
						</div>
						<div class="modal-body" style="padding:40px 50px;">
						<form role="form" action="index.php" method="POST" id="register">
						
						<div class="form-group">
						
							
							<input type="text" name="firstname" class="form-control" id="firstname" style="width: 100%;padding:5px; margin:0 10px 10px 0;float:left" pattern="[a-zA-Z]{1,}+[a-zA-Z\\s]{1,}" oninvalid="this.setCustomValidity('Please enter exact name')"
    						oninput="this.setCustomValidity('')" required placeholder="First Name"/>
							
							<input type="text" name="lastname" class="form-control" id="lastname" style="width: 100%; padding:5px;margin: 0 10px 10px 0;" pattern="[a-zA-Z]{1,}+[a-zA-Z\\s]{1,}" oninvalid="this.setCustomValidity('Please enter exact name')"
    						oninput="this.setCustomValidity('')"  placeholder="Last Name"/>
						 <!-- <label for="usrname"><span class="glyphicon glyphicon-user"></span> Name</label>
						  <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">-->
						
						  	<input type="email" name="email" class="form-control" id="email" style="width: 100%;padding:5px; margin:0 10px 10px 0;float:left"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninvalid="this.setCustomValidity('Please enter valid email')"
    						oninput="this.setCustomValidity('')"  required placeholder="Email"/>
							
							<input type="date" name="dob" class="form-control" id="dob" style="width: 100%; padding:5px;margin: 0 10px 10px 0;" required placeholder="Date of birth"/>
						
						 	<input type="text" name="branch" class="form-control" id="branch" style="width: 100%;padding:5px; margin:0 10px 10px 0;float:left"required placeholder="Branch"/>
							
							<input type="text" name="Batch" class="form-control" id="Batch" style="width: 100%; padding:5px;margin: 0 10px 10px 0;" pattern="2k+[0-1]{1}+[0-9]{1}" oninvalid="this.setCustomValidity('Please enter in 2kXX format')"
    						oninput="this.setCustomValidity('')" required placeholder="Batch"/>
						
						  	<input type="text" name="place" class="form-control" id="place" style="width: 100%;padding:5px; margin:0 10px 10px 0;float:left"required placeholder="From??"/>
							
							<input type="text" name="roll" class="form-control" id="roll" style="width: 100%; padding:5px;margin: 0 10px 10px 0;" pattern="[A-Z]{2,5}+10+[0-9]{3}+[0-9]{2}" oninvalid="this.setCustomValidity('Please enter roll in BE10XXXYY format')"
    						oninput="this.setCustomValidity('')" required placeholder="Roll No"/>
							</label>
						
						  	<input type="tel" name="mobile1" class="form-control" id="mobile1" style="width: 100%; padding:5px;margin: 0 10px 10px 0;"  pattern="[1-9]{1}+[0-9]{9}" oninvalid="this.setCustomValidity('Please 10 digit valid Mobile number')"
    						oninput="this.setCustomValidity('')"    required placeholder="WhatsApp Number"/>
							
							<input type="tel" name="mobile2" class="form-control" id="mobile2" style="width: 100%; padding:5px;margin: 0 10px 10px 0;" pattern="[1-9]{1}+[0-9]{9}" oninvalid="this.setCustomValidity('Please 10 digit valid Mobile number')"
    						oninput="this.setCustomValidity('')" placeholder="Alternative Number"/>
						
						
						
						  	<input type="password" name="password" class="form-control" id="password" pattern=".{6,}"  oninvalid="this.setCustomValidity('Six or more characters')"
    						oninput="this.setCustomValidity('')" style="width: 100%;padding:5px; margin:0 10px 10px 0;float:left" required placeholder="Password"/>
							
							<input type="password" name="conpassword" class="form-control" id="conpassword" style="width: 100%; padding:5px;margin: 0 10px 10px 0;" required placeholder="Confirm Password"/>
						
						
						<div class="checkbox">
						  <label><input type="checkbox" value="" checked>Remember me</label>
						</div>
						  <button type="submit" class="btn btn-success btn-block" style="align:center;font-size:17px;" name="register"><span class="glyphicon glyphicon-on"></span> Register</button>
						</form>
						</div>
				  </div>
				  
				</div>
			  </div> 
 <!--//modal register-->
  
  
		<!--	<div class="col-md-12 donate-info">
				<h4>Leave us a Message</h4>
				<p>Maecenas quis neque libero. Class aptent taciti.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Pellentesque
					convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget pulvinar neque
					pharetra ac.</p>
			</div> -->
		</div>
	<!--/ab-->
<div class="banner_bottom" id="about" style="padding:10px;">
	<div class="container" style="margin-top:40px;position:relative;">
		<h3 class="tittle_w3_agileinfo">About Us</h3>
		<div class="inner_sec_info_w3layouts">
			<div class="help_full">
				
						
						<div class="banner_bottom_left">
							

							<p style="font-size:24px;">The main purpose of the Samithi is to assist and promote culture activities , relations among the people of telugu origin as well as to promote exchange programs for students and Faculty of telugu origin people of BIT mesra</p>
							
							
						</div>
						

						<div class="respon_info_img">
							<div class="embed-responsive embed-responsive-16by9"> 
							<iframe width="560" height="315" src="https://www.youtube.com/watch?v=5X7WWVTrBvM" 
							frameborder="0" allowfullscreen></iframe>
						</div> 
						</div>
			</div>
		</div>
			<div class="news-main">
				<div class="col-md-6 banner_bottom_left">
					<div class="banner_bottom_pos">
						<div class="banner_bottom_pos_grid">
						<!--	<div class="col-xs-3 banner_bottom_grid_left">
								<div class="banner_bottom_grid_left_grid">
									<div class="dodecagon b1">
										<div class="dodecagon-in b1">
											<div class="dodecagon-bg b1">
												<span class="fas fa-camera-retro" aria-hidden="true"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--<div class="col-xs-9 banner_bottom_grid_right">
								<h4>Health and Medication</h4>
								<p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>
								<div class="barWrapper">
									<span class="progressText">
										<b>Donators</b>
									</span>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
											<span class="popOver" data-toggle="tooltip" data-placement="top" title="85%"> </span>
										</div>
									</div>
								</div>-->
							</div>


							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-6 banner_bottom_left">
					<div class="banner_bottom_pos">
						<!--<div class="banner_bottom_pos_grid">
							<div class="col-xs-3 banner_bottom_grid_left">
								<div class="banner_bottom_grid_left_grid">
									<div class="dodecagon b1">
										<div class="dodecagon-in b1">
											<div class="dodecagon-bg b1">
												<span class="far fa-thumbs-up" aria-hidden="true"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							</div>-->
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//ab-->
	
	<div class="events-coming">
				<div class="container">
					<div class="row">
						<div class="col">
							<center><h3 class="tittle_w3_agileinfo cen"> Our Family
							</h3></center>
						</div>
					</div>
					<div class="row">
									<div class="col-sm-3">
										<div class="row">
											<div id="shiva" class="col-sm-12">
												<span class="tag">Total</span>
											</div>

										</div>
										<div class="row">
											<?php
												$query="SELECT * FROM `users`";
												$res=mysqli_query($conn,$query);
												$count=mysqli_num_rows($res);
												echo '<div class="col-sm-12"><span class="count">'.$count.'</span></div>';
											?>
											
												
										</div>
									</div>

									<div class="col-sm-3">
										<div class="row">
											<div id="shiva" class="col-sm-12">
												<span class="tag">Student</span>
											</div>

										</div>
										<div class="row">
										<?php
												$query="SELECT * FROM `users`";
												$res=mysqli_query($conn,$query);
												$total=mysqli_num_rows($res);
												$query="SELECT * FROM `users` where alumini='YES'";
												$res=mysqli_query($conn,$query);
												$alumini=mysqli_num_rows($res);
												$query="SELECT * FROM `users` WHERE batch='faculty' OR 'Faculty'";
												$res=mysqli_query($conn,$query);
												$fac=mysqli_num_rows($res);
												$count=$total-$fac-$alumini;
												echo '<div class="col-sm-12"><span class="count">'.$count.'</span></div>';
											?>
												
										</div>
									</div>


									<div class="col-sm-3">
										<div class="row">
											<div id="shiva" class="col-sm-12">
												<span class="tag">Alumini</span>
											</div>

										</div>
										<div class="row">
										<?php
												$query="SELECT * FROM `users` where alumini='YES'";
												$res=mysqli_query($conn,$query);
												$count=mysqli_num_rows($res);
												echo '<div class="col-sm-12"><span class="count">'.$count.'</span></div>';
											?>
												
										</div>
									</div>

									<div class="col-sm-3">
										<div class="row">
											<div id="shiva" class="col-sm-12">
												<span class="tag">Faculty</span>
											</div>

										</div>
										<div class="row">
										<?php
												$query="SELECT * FROM `users` WHERE batch='faculty' OR 'Faculty'";
												$res=mysqli_query($conn,$query);
												$count=mysqli_num_rows($res);
												echo '<div class="col-sm-12"><span class="count">'.$count.'</span></div>';
											?>
												
										</div>
									</div>
						</div>
				
				
	</div>
</div>
	

	<!--/what-->
	<!--
	<div class="works" id="services">
		<div class="container">
			<h3 class="tittle_w3_agileinfo cen">Why Choose Us</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="ser-first">
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-edit" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<h3>Food Delivering</h3>
						<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-paper-plane" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<h3>Volunteer</h3>
						<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-star" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<h3>Donation</h3>
						<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-user" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<h3>Scholarship</h3>
						<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
	</div> -->
	<!--//what-->

	<!--/gallery-->
<!--	<div class="banner_bottom proj" id="gallery">
		<div class="wrap_view">
			<h3 class="tittle_w3_agileinfo">Gallery</h3>
			<div class="inner_sec_info_w3layouts">
				<ul class="portfolio-categ filter">
					<li class="port-filter all active">
						<a href="#">All</a>
					</li>
					<li class="cat-item-1">
						<a href="#" title="Category 1">Charity</a>
					</li>
					<li class="cat-item-2">
						<a href="#" title="Category 2">Nature</a>
					</li>
					<li class="cat-item-3">
						<a href="#" title="Category 3">Wildlife</a>
					</li>
					<li class="cat-item-4">
						<a href="#" title="Category 4">Children</a>
					</li>
				</ul>


				<ul class="portfolio-area">

					<li class="portfolio-item2" data-id="id-0" data-type="cat-item-4">
						<div>
							<span class="image-block img-hover">
								<a class="image-zoom" href="images/g1.jpg" rel="prettyPhoto[gallery]">

									<img src="images/g1.jpg" class="img-responsive" alt="Relief">

								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-1" data-type="cat-item-2">
						<div>
							<span class="image-block">
								<a class="image-zoom" href="images/g2.jpg" rel="prettyPhoto[gallery]">

									<img src="images/g2.jpg" class="img-responsive" alt="Relief">

								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1">
						<div>
							<span class="image-block">
								<a class="image-zoom" href="images/g3.jpg" rel="prettyPhoto[gallery]">

									<img src="images/g3.jpg" class="img-responsive" alt="Relief">

								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-3" data-type="cat-item-4">
						<div>
							<span class="image-block">
								<a class="image-zoom" href="images/g4.jpg" rel="prettyPhoto[gallery]">

									<img src="images/g4.jpg" class="img-responsive" alt="Relief">

								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-4" data-type="cat-item-3">
						<div>
							<span class="image-block">
								<a class="image-zoom" href="images/g5.jpg">

									<img src="images/g5.jpg" class="img-responsive" alt="Relief">

								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-5" data-type="cat-item-2">
						<div>
							<span class="image-block">
								<a class="image-zoom" href="images/g6.jpg" rel="prettyPhoto[gallery]">

									<img src="images/g6.jpg" class="img-responsive" alt="Relief">

								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-6" data-type="cat-item-1">
						<div>
							<span class="image-block">
								<a class="image-zoom" href="images/g7.jpg" rel="prettyPhoto[gallery]">

									<img src="images/g7.jpg" class="img-responsive" alt="Relief">

								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1">
						<div>
							<span class="image-block">
								<a class="image-zoom" href="images/g8.jpg" rel="prettyPhoto[gallery]">

									<img src="images/g8.jpg" class="img-responsive" alt="Relief">


								</a>
							</span>
						</div>
					</li>

					<div class="clearfix"> </div>
				</ul>
				<!--end portfolio-area -->
			<!--</div>
		</div>
	</div> -->


	<!--//gallery-->

	<!--/last-->
	<!--
	<div class="banner_bottom">
		<div class="container">
			<h3 class="tittle_w3_agileinfo"> Our Causes
			</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="last_sec">
					<div class="col-md-6 last-img-info-text">
						<h4>The causes title goes here </h4>
						<p>Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
							pulvinar neque pharetra ac. Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla
							viverra pharetra sem, eget pulvinar neque pharetra ac.
						</p>
						<div class="ab_button">
							<a class="btn btn-primary btn-lg" href="single.html" role="button">Read More </a>
						</div>
					</div>
					<div class="col-md-6 last-img-info_main">
						<div class="col-md-6 last-img-info">
							<div class="dodecagon l1">
								<div class="dodecagon-in l1">
									<div class="dodecagon-bg l1">

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 last-img-info">
							<div class="dodecagon l2">
								<div class="dodecagon-in l2">
									<div class="dodecagon-bg l2">

									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div> -->
	<!--//last-->
	
		
		<!--/team-->
		<div class="banner_bottom" id="team">
		<div class="container">
			<h3 class="tittle_w3_agileinfo">Committee</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="ser-first">
					<div class="col-md-3 photo-grid text-center">
						<div class="dodecagon t1">
							<div class="dodecagon-in t1">
								<div class="dodecagon-bg t1">

								</div>
							</div>
						</div>
						<h3>XXXXXXX</h3>
						<p>Volunteer</p>
					<!--	<div class="team_icons">
							<ul class="social-nav model-3d-0 footer-social social">
								<li>
									<a href="#" class="facebook">
										<div class="front">
											<i class="fab fa-facebook-f" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<div class="front">
											<i class="fab fa-twitter" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<div class="front">
											<i class="fab fa-instagram" aria-hidden="true"></i>
										</div>

									</a>
								</li>
							</ul>

						</div>-->

					</div>
					<div class="col-md-3 photo-grid text-center">
						<div class="dodecagon t2">
							<div class="dodecagon-in t2">
								<div class="dodecagon-bg t2">

								</div>
							</div>
						</div>
						<h3>XXXXXXX</h3>
						<p>Volunteer</p>
						<!-- <div class="team_icons">
							<ul class="social-nav model-3d-0 footer-social social">
								<li>
									<a href="#" class="facebook">
										<div class="front">
											<i class="fab fa-facebook-f" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<div class="front">
											<i class="fab fa-twitter" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<div class="front">
											<i class="fab fa-instagram" aria-hidden="true"></i>
										</div>

									</a>
								</li>

							</ul>

						</div> -->

					</div>
					<div class="col-md-3 photo-grid text-center">
						<div class="dodecagon t3">
							<div class="dodecagon-in t3">
								<div class="dodecagon-bg t3">

								</div>
							</div>
						</div>
						<h3>XXXXXXX</h3>
						<p>Volunteer</p>
						<!-- <div class="team_icons">
							<ul class="social-nav model-3d-0 footer-social social">
								<li>
									<a href="#" class="facebook">
										<div class="front">
											<i class="fab fa-facebook-f" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<div class="front">
											<i class="fab fa-twitter" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<div class="front">
											<i class="fab fa-instagram" aria-hidden="true"></i>
										</div>

									</a>
								</li>

							</ul>

						</div> -->

					</div>
					<div class="col-md-3 photo-grid text-center">
						<div class="dodecagon t4">
							<div class="dodecagon-in t4">
								<div class="dodecagon-bg t4">

								</div>
							</div>
						</div>
						<h3>XXXXXXX</h3>
						<p>Volunteer</p>
						<!-- <div class="team_icons">
							<ul class="social-nav model-3d-0 footer-social social">
								<li>
									<a href="#" class="facebook">
										<div class="front">
											<i class="fab fa-facebook-f" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<div class="front">
											<i class="fab fa-twitter" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<div class="front">
											<i class="fab fa-instagram" aria-hidden="true"></i>
										</div>

									</a>
								</li>

							</ul>

						</div> -->

					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
	</div>
	<!--//team-->
	<!--/price-->
	<!--
	<div class="price-sec" id="price">
		<div class="container">
			<h3 class="tittle_w3_agileinfo">Simple Pricing</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="col-md-4 last-img-info-text">
					<h4>Become a Guardian</h4>
					<p>Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
						pulvinar neque pharetra ac. Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla
						viverra pharetra sem, eget pulvinar neque pharetra ac.
					</p>
					<div class="ab_button">
						<a class="btn btn-primary btn-lg scroll" href="#contact">Donate Now </a>
					</div>
				</div>
				<div class="col-md-8 price-grid-main">
					<div class="price-info">
						<div class="prices">
							<div class="prices-top">
								<div class="dodecagon s1">
									<div class="dodecagon-in s1">
										<div class="dodecagon-bg s1">
											<h3>$30</h3>
										</div>
									</div>
								</div>

							</div>
							<div class="prices-bottom">
								<div class="prices-h">
									<h4>Standard</h4>

								</div>
								<ul>
									<li>First Des</li>
									<li>Second Des</li>
									<li> Third Des</li>
									<li>Fourth Des</li>
									<li class="dash">-</li>
								</ul>
								<a href="#" data-toggle="modal" data-target="#myModal1" class="button">sign up</a>
							</div>
						</div>
					</div>
					<div class="price-info">
						<div class="prices second">
							<div class="prices-top">
								<div class="dodecagon s1">
									<div class="dodecagon-in s1">
										<div class="dodecagon-bg s1">
											<h3>$90</h3>
										</div>
									</div>
								</div>

							</div>
							<div class="prices-bottom">
								<div class="prices-h">
									<h4>Golden</h4>

								</div>
								<ul>
									<li>First Des</li>
									<li>Second Des</li>
									<li> Third Des</li>
									<li>Fourth Des</li>
									<li class="dash">-</li>
								</ul>
								<a href="#" data-toggle="modal" data-target="#myModal1" class="button">sign up</a>
							</div>
						</div>
					</div>
					<div class="price-info">
						<div class="prices">
							<div class="prices-top">
								<div class="dodecagon s1">
									<div class="dodecagon-in s1">
										<div class="dodecagon-bg s1">
											<h3>$60</h3>
										</div>
									</div>
								</div>

							</div>
							<div class="prices-bottom">
								<div class="prices-h">
									<h4>Silver</h4>

								</div>
								<ul>
									<li>First Des</li>
									<li>Second Des</li>
									<li> Third Des</li>
									<li>Fourth Des</li>
									<li class="dash">-</li>
								</ul>
								<a href="#" data-toggle="modal" data-target="#myModal1" class="button">sign up</a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div> -->
	<!--//price-->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header book-form">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4>Sign up Form</h4>
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="Your Name" required="" />
						<input type="email" name="Email" class="email" placeholder="Email" required="" />
						<input type="password" name="Password" class="password" placeholder="Password" required="" />
						<div class="check-box">
							<input name="chekbox" type="checkbox" id="brand" value="">
							<label for="brand">
								<span></span>Remember Me.</label>
						</div>
						<input type="submit" value="Sign Up">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->
	<!--/testimonials-->
	
	<!--<div class="tesimonials" id="test">
		<div class="container">
			<h3 class="tittle_w3_agileinfo cen">Testimonials</h3>
			<div class="inner_sec">
				<div class="test_grid_sec">
					<div class="col-md-offset-2 col-md-8">
						<div class="carousel slide two" data-ride="carousel" id="quote-carousel">
							<!-- Bottom Carousel Indicators -->
							
							<!--<ol class="carousel-indicators two">
								<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#quote-carousel" data-slide-to="1"></li>
								<li data-target="#quote-carousel" data-slide-to="2"></li>
							</ol>

							<!-- Carousel Slides / Quotes -->
						<!--	<div class="carousel-inner">

								<!-- Quote 1 -->
							<!--	<div class="item active">
									<blockquote>
										<div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c1">
													<div class="dodecagon-in c1">
														<div class="dodecagon-bg c1">

														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i> Maecenas quis neque libero. Class aptent taciti.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													Etiam auctor nec lacus ut tempor. Mauris.</p>
												<h6>Sara Lisbon</h6>
											</div>
										</div>
									</blockquote>
								</div>
								<!-- Quote 2 -->
							<!--	<div class="item">
									<blockquote>
										<div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c2">
													<div class="dodecagon-in c2">
														<div class="dodecagon-bg c2">

														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i> Lorem ipsum dolor sit amet. Class aptent taciti.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													Etiam auctor nec lacus ut tempor. Mauris.</p>
												<h6>Jane Wearne</h6>
											</div>
										</div>
									</blockquote>
								</div>
								<!-- Quote 3 -->
						<!--		<div class="item">
									<blockquote>
										<div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c3">
													<div class="dodecagon-in c3">
														<div class="dodecagon-bg c3">

														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i> Maecenas quis neque libero. Class aptent taciti.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													Etiam auctor nec lacus ut tempor. Mauris.</p>
												<h6>Alice Williams</h6>
											</div>
										</div>
									</blockquote>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!--//testimonials-->

	<!-- /newsletter-->
	
	<!--<div class="newsletter">
		<div class="col-sm-6 newsleft">
			<h3>Sign up for Newsletter !</h3>
		</div>
		<div class="col-sm-6 newsright">
			<form action="#" method="post">
				<input type="email" placeholder="Enter your email..." name="email" required="">
				<input type="submit" value="Submit">
			</form>
		</div>

		<div class="clearfix"></div>
	</div>-->
	
	<!-- //newsletter-->

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
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- script for responsive tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
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
	<script src="js/responsiveslides.min.js"></script>
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
	<script type="text/javascript" src="js/all.js"></script>
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>

	<!-- js -->
<!--	<script type="text/javascript" src="js/simplyCountdown.js"></script>
	<link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
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
	</script>-->
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
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
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
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<script src="js/jquery.quicksand.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->
	<script>
		$(window).scroll(startCounter);
function startCounter() {
		console.log($(window).scrollTop());
    if ($(window).scrollTop() > 1200) {
        $(window).off("scroll", startCounter);
        $('.count').each(function () {
            var $this = $(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                duration: 4000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.Counter));
                }
            });
        });
    }
}
	</script>
	
<script>
$(document).ready(function(){
  $(".myBtnlo").click(function(){
    $("#myModal").modal();
  });
  $(".myBtnreg").click(function(){
    $("#myModalreg").modal();
  });
});
</script>


	


</body>

</html>