<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>:: Linked Home ::</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Inspire Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" 	href="css/chocolat.css" type="text/css" media="all">
<!--// css -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
	<!-- Popup-Box-JavaScript -->
	<script src="js/modernizr.custom.97074.js"></script>
	<script src="js/jquery.chocolat.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.gallery-grids a').Chocolat();
		});
	</script>
	<!-- //Popup-Box-JavaScript -->
	<!-- start-smooth-scrolling -->
			<script type="text/javascript" src="js/move-top.js"></script>
			<script type="text/javascript" src="js/easing.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
			</script>
	<!-- //start-smoth-scrolling -->
		<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
		
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script type="text/javascript" src="js/modernizr.custom.53451.js"></script> 
 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
</script>	
</head>
<body onload="focusOnInput()">
	<div class="header">
		<div class="container">
			<div class="logo-w3">
				<a href="#about" class="scroll"><h1 style="color:#ffffff; margin-top:15px">Linked 
					<?php 	
					/*if(isset($_SESSION['login-attempt'])){
						echo "s =".$_SESSION['login-attempt']; }
					if(isset($_COOKIE['login-attempt'])){
						echo "c = ".$_COOKIE['login-attempt'];
					} */
					?> </h1></a>
		    </div>
			<div class="w3l_header_right">
				<ul>
							<?php 
							@session_start();
							if (!isset($_SESSION['id'])) {
								if(isset($_COOKIE['login-attempt'])){
									if($_COOKIE['login-attempt'] == 5){	
										//print_r($_COOKIE);	
										echo '<li style="margin:10px"><a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#"><span class="glyphicon glyphicon-user" aria-hidden="true" ></span>You Cant Sign In For 10 Minutes</a></li>';
									}else{
										//print_r($_COOKIE);
										echo '<li style="margin:10px"><a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" id="signinbtn" href="#small-dialog"><span class="glyphicon glyphicon-user" aria-hidden="true" ></span>Sign In</a></li>';
	
									}
								}
								else{
								//print_r($_COOKIE);	
									echo '<li style="margin:10px"><a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#small-dialog"><span class="glyphicon glyphicon-user" aria-hidden="true" ></span>Sign In!</a></li>';
 								}
							}
							else{ if(isset($_SESSION['utype'])){

								if($_SESSION['utype'] == 'admin'){
										header('Location: admin.php');}
								    elseif ($_SESSION['utype'] == 'student') {
								  		header('Location: student.php');}
								  	elseif ($_SESSION['utype'] == 'lecturer') {
								  		header('Location: lecturer.php');}
								  	elseif ($_SESSION['utype'] == 'parent') {
								  		header('Location: parents.php');}
								  	else{echo "Something Wrong !".$_SESSION['utype'];}
								  	
							  	}else{
							  	echo "utype isn't set";
							  	}
							}
						
							  function alert($msg) {
    echo "<script type='text/javascript'>alert('".$msg."');</script>";
    //header('Refresh:0.0; url=../index.php',303,false);
} 
function alert2($msg,$var) {
    echo "<script type='text/javascript'>alert('".$msg.$var."');</script>";
    //header('Refresh:0.0; url=../index.php',303,false);
} 
					  ?>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
			
		</div>
	</div>
	<div class="logo-navigation-w3layouts">
		<div class="container">
		
		<div class="navigation agileits w3layouts">
			<nav class="navbar agileits w3layouts navbar-default">
				<div class="navbar-header agileits w3layouts">
					<button type="button" class="navbar-toggle agileits w3layouts collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
						<span class="sr-only agileits w3layouts">Toggle navigation</span>
						<span class="icon-bar agileits w3layouts"></span>
						<span class="icon-bar agileits w3layouts"></span>
						<span class="icon-bar agileits w3layouts"></span>
					</button>
				</div>
				<div class="navbar-collapse agileits w3layouts collapse hover-effect" id="navbar">
					<ul class="agileits w3layouts">
						<li class="agileits w3layouts"><a href="#" class="active">Home</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#about">About</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#contact">Contact</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>

	<div class="banner">
		<h3>Student Performance Monitoring System</h3>
		<h2><span>L</span>inked</h2>
		<h4>Our goal is to transform them <?php //session_start(); if(empty($_SESSION)){print_r("q".$_SESSION);}else{print_r("w".$_SESSION);}?></h4>
		<div class="arrow">
			<a href="#contact" class="scroll"><img src="images/arrow.png" alt=" " /></a>
		</div>
	</div>
	<!-- about -->
	<div class="about-w3-agile" id="about" >
		<div class="container" >
			<div class="wthree_about_grids" >
				<div class="col-md-6 wthree_about_grid_left" ><center>
					<h3>About Linked</h3>
							<p>The Main Objective of This System is, To Improve Transparency Between College/School And Parents Of Student.
Sometimes Parents Doesn't Know What Is Happening In Their Child's School/College. This System Will Send Data To Parents About Student Like, Result Details, Mid Semester Result Details, Attendance Days, Homework Is Complete Or Not.</p>
				</center></div>
			</div>
		
<!--Contact-->
	<div class="contact-w3-agileits"  id="contact" style="width:300px; float:right; margin-right:100px; margin-top:0px; padding-top:0px;" >
		<div class="container" style="width:300px;">

			<div class="col-md-5 contact-left-w3ls" style="width:400px; margin-right:20px;">
				<h3>Contact info</h3>

				<div class="mail" >

					<div class="col-md-2 contact-icon-wthree">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					
					<div class="col-md-10 contact-text-agileinf0">
						<h4>Mail us</h4>
						<h5><a href="mailto:info@example.com">School.Email@email.com</a></h5>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="call">
					<div class="col-md-2 contact-icon-wthree">
						<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
					</div>
					<div class="col-md-10 contact-text-agileinf0">
						<h4>Call us</h4>
						<h5>+1234567890</h5>
					</div>
					<div class="clearfix"></div>
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="clearfix"></div>
		
	<!--Footer-->
<div class="footer-w3l">
	<p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>

<div class="pop-up" > 
	<div id="small-dialog" class="mfp-hide book-form" onload="focusOnInput()">
		<h3>Sign In </h3>
			<form action="p/login.php" method="post">
				<script type="text/javascript">
				function focusOnInput(){ 
					document.getElementById('id').focus(); 
				}
				</script>
				<input autofocus pattern='[SPLA][0-9]+' id="id" type="text" name="id"  placeholder="Enter ID ex.S01,L01,L01,A01" required="" autocomplete="off"/>
				<input type="password" name="pwd" class="password" placeholder="Enter Password Here" required=""/>				          
			<div class="clearfix"></div>
				<input type="submit" value="Sign In">
			</form>
	</div>
</div>
</body>
</html>