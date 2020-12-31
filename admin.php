
<!DOCTYPE html>
<html lang="en">
<head>
<title>:: Linked Admin Home ::</title>
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
<link rel="stylesheet" href="style_link.css" type="text/css" />
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
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
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
<style type="text/css"> li.cl1 {padding:10px; font-size:30px;} marquee{padding-left: 5% ; font-size: 20px; font-style: italic; } </style>	
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo-w3">
				<a class='nav-item' href="#about" class="scroll"><h1 style="color:#ffffff; margin-top:15px"><!--<img src="images/logo.png" alt="linked_Logo" style="height:70px;"/>-->linked</h1></a>
		    </div>
			<div class="w3l_header_right">
				<ul>
							<?php 
							session_start();
							if(isset($_SESSION['utype'])){

								if($_SESSION['utype'] == 'parents'){
										header('Location: parents.php');}
								    elseif ($_SESSION['utype'] == 'student') {
								  		header('Location: student.php');}
								  	elseif ($_SESSION['utype'] == 'lecturer') {
								  		header('Location: lecturer.php');}				  	
							  	}else{
							  	echo "utype isn't set";
							  	}
							if (!isset($_SESSION['id'])){
							header("Location: index.php"); }else{ echo'
					<li style="margin:10px"><a href="p/logout.php"><span class="glyphicon glyphicon-user" aria-hidden="true">'.$_SESSION['id'].'</span>Sign Out</a></li>
						'; }?>
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
	</div>
	<!-- <hr style="width: 100%;">
	<h1 style="width: 100%;"> Notification Panel </h1>
 	feedback
	<hr style="width: 400px;"> -->
	
			<!-- <?php/*require('p/linked_conn.php');
			$date = date("Y-m-d");
			//Homework
			$query1 = "select * from Feedback where r_flag = 'false'";

			if($run = $conn->query($query1)){
				while($res2 = $run->fetch_assoc()){//hid,days,occ,date
						echo "<marquee direction='UP' scrollamount='0'>Feedback From Parent ID -  ".$res2['p_id'].", Subject = ".$res2['subj'].". Details = ".$res2['details']."</marquee>";
				}
			}*/?> -->
			
	<hr style="width: 100%;">
<div class="container">
	
	<h1 style="width: 100%; ">-- Click Above Links To See Details --</h1><hr style="width: 400px">
	<ol style="width:600px; padding-left: 100px; float:left;" type="i">
		<li class="cl1"><a class='nav-item' href="disp/disp_stupnt.php">Students &amp; Parents Details</a></li>
		<li class="cl1"><a class='nav-item' href="disp/le_list.php">Faculty Details</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_hod.php">HOD Details</a></li>
		<li class="cl1"><a class='nav-item' href="disp/r_fb.php">Read Feedback</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_wtt.php">Weekly Time Table</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_ett.php">Mid sem exam time table</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_ssturec.php">Semwise Student Record</a></li>
		<li class="cl1"><a class='nav-item' href="http://result2.gtu.ac.in/Default.aspx">GTU Result (on GTU site)</a></li>
	</ol>
	
</div><hr style="width: 100%; "><div class="container">
	
		<br><h1 style="width: 100%; float:left;"> -- Click Here To Submit Forms -- </h1><br><br><hr style="width: 400px">
		
	<ol style="width:50%; padding-left: 100px; float:left;" type="i">
		<li class="cl1"><a class='nav-item' href="p/adm/daily.php">Click this at end of the everyday (To increment in attandance of all students)</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/adm.php">Admission</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/adm_c.php">Cancel Admission</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/adm_c_del_rec.php">Delete All Records Of Student</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/a_event.php">Add New Event</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/del_event.php">Delete Event</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/d_holi.php">Declare Holiday</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/del_holi.php">Delete Holiday</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/etti.php">Exam Time Table Insert</a></li> 
		<li class="cl1"><a class='nav-item' href="form/adm/ettu.php">Exam Time Table Delete</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/fee_sub.php">Submit Paid Fees</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/r_le.php">Recruit Faculty</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/re_le.php">Remove Faculty</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/hod_mr.php">Make(Removes old one) HOD</a></li>
		
	</ol>

	<ol style="width:50%; padding-right:70px; float:right" type="i">
		<li class="cl1"><a class='nav-item' href="form/adm/s_notice.php">Send Notice</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/wttu.php">Weekly Time Table Update</a></li>	
		<li class="cl1"><a class='nav-item' href="form/adm/wtti.php">Weekly Time Table Insert</a></li>	
		<li class="cl1"><a class='nav-item' href="form/adm/sem_incr.php">Student Sem Increment</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/p_det_u.php">Parent Details Update</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/s_det_u.php">Student Details Update</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/l_det_u.php">Faculty Details Update</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/g_leave_l.php">Grant Leave To Faculty</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/a_sub.php">Add subject</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/r_sub.php">Remove subject completely</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/r_sub_l.php">Revoke subject from Lecturer/Professor</a></li>
		<li class="cl1"><a class='nav-item' href="form/adm/a_sub_l.php">Assign subject to Lecturer/Professor</a></li>
		<li class="cl1"><a class='nav-item' href="p/pass_cg.php">Change password</a></li>
	</ol>
</div>
	<!-- about -->
	<style type="text/css">.centered {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  position: fixed;

}</style>   
<!-- <div class="centered"> -->
<hr style="width: 100%">
<div class="about-w3-agile" id="about" style="float:left; width:100%; text-align: center;" >
	
	<div class="container" >
		<div class="wthree_about_grids" >
			<div class="col-md-6 wthree_about_grid_left" >
				<center>
					<h3>About linked</h3>
					<p>It is a college website, it improves transparency between faculty and parents of students.
						this system will send data to parents about student like, result details, mid semester result details, attendance days, homework is complete or not. and it also notifies about events,holidays,etc. and it allows parents to ask leave within 1 month.</p>
				</center>
			</div>
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
							<h5><a class='nav-item' href="mailto:info@example.com">Balaji.Inst@email.com</a></h5>
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
		<!-- </div> -->
	<!--Footer-->
<div class="footer-w3l" style="width: 100%;">
	<p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p> 
</div>
<!-- style="width: 1280px;" -->