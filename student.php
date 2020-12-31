<!DOCTYPE html>
<html lang="en">
<head>
<title>:: Linked Student Home ::</title>
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
<link rel="stylesheet" type="text/css" href="form/style_link.css">
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
				<a href="#about" class="scroll"><h1 style="color:#ffffff; margin-top:15px">Linked </h1></a>
		    </div>
			<div class="w3l_header_right">
				<ul>
							<?php 
							session_start();
							if(isset($_SESSION['utype'])){

								if($_SESSION['utype'] == 'admin'){
										header('Location: admin.php');}
								    elseif ($_SESSION['utype'] == 'lecturer') {
								  		header('Location: lecturer.php');}
								  	elseif ($_SESSION['utype'] == 'parent') {
								  		header('Location: parents.php');}							  	
							  	}else{
							  	echo "utype isn't set";
							  	}
							if (!isset($_SESSION['id'])){
							header("Location: index.php");}else{ echo'
					<li style="margin:10px"><a href="p/logout.php"><span class="glyphicon glyphicon-user" aria-hidden="true">'.$_SESSION['id'].'</span>Sign Out</a></li>
						'; }?>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
			
		</div>
	</div>
	<div class="logo-navigation-w3layouts" > 
		<div class="container" >
		
		<div class="navigation agileits w3layouts">
			<nav class="navbar agileits w3layouts navbar-default">
				<div class="navbar-header agileits w3layouts" >
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
	<hr style="width: 100%;">
	<h1 style="width: 100%;"> Notification Panel </h1>
	<hr style="width: 400px;">
	<!--student_notification_panel - holiday,events,notice,fees,leave_granted,surprise-test,mid_m_submitted-->
	<?php
			require('p/linked_conn.php');
			$date = date("Y-m-d");

			$query3 = "select * from holiday where date >= '$date'";

			if($run = $conn->query($query3)){
				while($res = $run->fetch_assoc()){//hid,days,occ,date
						echo "<marquee direction='UP' scrollamount='0'>We Need To Inform You That There Is A Holiday On ".$res['date'].". reason: '".$res['occ']."'. For ".$res['days']." Days. <br></marquee>";
				}
			}

			$query4 = "select * from event where date >= '$date'";

			if($run = $conn->query($query4)){
				while($res2 = $run->fetch_assoc()){//e_id,date,detail
						echo "<marquee direction='UP' scrollamount='0'>We need to inform you that there is an event on ".$res2['date']."  Event Title : '".$res2['e_name']."'. Details: ".$res2['detail']." <br></marquee>";
				}
			}
			$id = $_SESSION['id'];
			$date = date('Y-m-d');
			$b5day = date('Y-m-d',strtotime("-4 day",strtotime($date)));
			$query5 = "select * from notice where date >= '$b5day'";
			if($run = $conn->query($query5)){
				while($res3 = $run->fetch_assoc()){//nid,title,date,details
						echo "<marquee direction='UP' scrollamount='0'>! NOTICE : ".$res3['title'].", ".$res3['details'].". Date : ".$res3['date'].".<br></marquee>";
				}
			}
			$query6 = "select * from student where s_id = '$id'";

			if($run = $conn->query($query6)){
				while($res4 = $run->fetch_assoc()){//fees_p,id(session)
					
					if($res4['fees_p'] == 'false'){
						echo "<marquee direction='UP' scrollamount='0'>We Noticed That Your Fees Are Pending, Please Pay Fees Or You Will Be Charged After Due Date.<br></marquee>";
					}
				}
			}
			$date = date('Y-m-d');
			$sid = $_SESSION['id'];
			$query7 = "select * from a_leave where s_id = '$sid' AND to_date >= '$date' AND `granted?` = 1";
			if($run = $conn->query($query7)){
				while($res5 = $run->fetch_assoc()){//fees_p,id(session)
					echo "<marquee direction='UP' scrollamount='0'>Faculty has granted your leave request submitted by your parent, LeaveID = ".$res5['le_id'].". From-date = ".$res5['from_date'].". To-Date = ".$res5['to_date'].". Reason = ".$res5['reason'].". <br></marquee>";
				}
			}else{
				echo mysqli_error($conn);
			}
			$b5day = date('Y-m-d', strtotime('-4 day', strtotime($date)));
			$query7 = "select * from randomtest where s_id = '$sid' AND date >= '$b5day'";
			if($run = $conn->query($query7)){
				while($res7 = $run->fetch_assoc()){//fees_p,id(session)
					echo "<marquee direction='UP' scrollamount='0'>In surprise test, of ".$res7['subject'].". on ".$res7['date']." date. Organized by facultyID, ".$res7['l_id'].". You got ".$res7['marks']." marks.<br></marquee>";
				}
			}else{
				echo mysqli_error($conn);
			}

			$b15day = date('Y-m-d', strtotime("-14 day", strtotime($date)));
			$sem = $_SESSION['sem'];
			$query7 = "select * from midmarks where s_id = '$sid' AND sem = '$sem' AND submit_date >= '$b15day'";
			if($run = $conn->query($query7)){
				$res7 = $run->fetch_assoc();//fees_p,id(session)
				if($res7 != NULL){
					echo "<marquee direction='UP' scrollamount='0'>Mid Semester marks of sem ".$res7['sem']." is submitted on ".$res7['submit_date'].". Please check 'View mid marks' link below. <br></marquee>";
				}
			}else{
				echo mysqli_error($conn);
			}
			
	?> <hr style="width: 100%;">
	
<div class="container" style="width: 90%">
	<h1>-- Click Above Links To See Details --</h1>
	<hr style="width: 400px">
	<ol style="width:500px; padding-left:100px; float:left;" type="i">
		<li class="cl1"><a class="nav-item" href="disp/disp_stupnt.php">My details</a></li>
		<li class="cl1"><a class="nav-item" href="disp/disp_wtt.php">View weekly time table</a></li>
		<li class="cl1"><a class="nav-item" href="disp/disp_ett.php">View mid sem exam time table</a></li>
		<li class="cl1"><a class="nav-item" >Total attendance = <?php @session_start(); $sid=$_SESSION['id']; require('p/linked_conn.php'); $query="select * from `student` where `s_id` = '$sid'"; 
			if($run = $conn->query($query)){
				$run2 = $run->fetch_assoc();
				$_SESSION['total-att'] = $run2['total-att']; 	
				echo $_SESSION['total-att'];
			}else{
				echo $conn->error;
			}
			//print_r($_SESSION);
		?> </a></li>
		<li class="cl1"><a class="nav-item" href="disp/disp_mmarks.php">View mid-sem exam marks</a></li>
	</ol>

	<ol style="width:500px; padding-left:50px; float:right;" type="i">
		<li class="cl1"><a class="nav-item" href="disp/disp_dsturec.php">View daily student record</a></li>
		<li class="cl1"><a class="nav-item" href="disp/disp_ssturec.php">View semwise student record</a></li>
		<li class="cl1"><a class="nav-item" href="http://result2.gtu.ac.in/Default.aspx">GTU result (on GTU site)</a></li>
		<li class="cl1"><a class="nav-item" href="disp/disp_rtest.php">View surprise test marks</a></li>
		<li class="cl1"><a class="nav-item" href="p/pass_cg.php">Change password</a></li>
	</ol>
</div>	
	<!-- about -->
<hr style="width: 100%">
<div class="about-w3-agile" id="about" style="width: 100%; padding-left: 30px;" >
	<div class="container" style="width: 100%">
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
		<div class="contact-w3-agileits"  id="contact" style="width: 30%; float:right;  margin-right:50px; " >
			<div class="container" style="width: 90%">
				<div class="col-md-5 contact-left-w3ls" style="width: 125%; margin-right:20px;">
					<h3>Contact info</h3>
					<div class="mail" >
						<div class="col-md-2 contact-icon-wthree">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 contact-text-agileinf0">
							<h4>Mail us</h4>
							<h5><a class="nav-item" href="mailto:info@example.com">Balaji.Inst@email.com</a></h5>
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
	<p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team </a></p> 
</div>
