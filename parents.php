
<!DOCTYPE html>
<html lang="en">
<head>
<title>:: Linked Parents Home ::</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Inspire Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="disp/disp/css/style_link.css" type="text/css"/>
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
<style type="text/css"> li.cl1 {padding:10px; font-size:30px;} marquee{padding-left: 5% ;font-size: 20px; font-style: italic; } </style>	
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo-w3">
				<a href="#about" class="scroll"><h1 style="color:#ffffff; margin-top:15px"><!--<img src="images/logo.png" alt="linked_Logo" style="height:70px;"/>-->linked</h1></a>
		    </div>
			<div class="w3l_header_right">
				<ul>
							<?php 
							session_start();
							if(isset($_SESSION['utype'])){

								if($_SESSION['utype'] == 'admin'){
										header('Location: admin.php');}
								    elseif ($_SESSION['utype'] == 'student') {
								  		header('Location: student.php');}
								  	elseif ($_SESSION['utype'] == 'lecturer') {
								  		header('Location: lecturer.php');}				  	
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
	<hr style="width: 100%;">
	<h1 style="width: 100%;"> Notification Panel </h1>
 	<!--parent_notification_panel - home-work,present,holiday,events,notice,fees,leave_granted,complaints,surprise-test,mid_m_submitted-->
	<hr style="width: 400px;">
	<?php
			require('p/linked_conn.php');
			$date = date("Y-m-d");
			//Homework
			$query1 = "select * from dailysturec where date = '$date'";

			if($run = $conn->query($query1)){
				while($res2 = $run->fetch_assoc()){//hid,days,occ,date
					if (!($res2['home-work'] == 'TRUE')) {
						echo "<marquee direction='UP' scrollamount='0'>We need to inform you that your child have not done given work of, ".$res2['home-work']." subjects. </marquee>";
					}
				}
			}else{
				echo mysqli_error($conn);
			}
			//present 
			$query2 = "select * from `dailysturec` where `date` = '$date'";

			if($run = $conn->query($query2)){
				while($res2 = $run->fetch_assoc()){//hid,days,occ,date
						if (!($res2['present?'] == 'TRUE')) {
							echo "<marquee direction='UP' scrollamount='0'>We need to inform you that your child is absent today in lectures of, ".$res2['present?'].".</marquee>";
						}
				}
			}else{
				echo mysqli_error($conn);
			}

			$query3 = "select * from holiday where date >= '$date'";
			if($run = $conn->query($query3)){
				while($res = $run->fetch_assoc()){//hid,days,occ,date
						echo "<marquee direction='UP' scrollamount='0'>We need to inform you that there is a holiday on ".$res['date'].". Reason: '".$res['occ']."'. For ".$res['days']." days. <br></marquee>";
				}
			}else{
				echo mysqli_error($conn);
			}

			$query4 = "select * from event where date >= '$date'";
			if($run = $conn->query($query4)){
				while($res2 = $run->fetch_assoc()){//e_id,date,detail
						echo "<marquee direction='UP' scrollamount='0'>We need to inform you that there is an event on ".$res2['date']."  Event Title : '".$res2['e_name']."'. Details: ".$res2['detail']." <br></marquee>";
				}
			}else{
				echo mysqli_error($conn);
			}
			
			$id = $_SESSION['id'];
			$date = date('Y-m-d');
			$b5day = date('Y-m-d',strtotime("-4 day",strtotime($date)));
			$query5 = "select * from notice where date >= '$b5day'";
			if($run = $conn->query($query5)){
				while($res3 = $run->fetch_assoc()){//nid,title,date,details
						echo "<marquee direction='UP' scrollamount='0'>! NOTICE : ".$res3['title'].", ".$res3['details'].". Date : ".$res3['date'].".<br></marquee>";
				}
			}else{
				echo mysqli_error($conn);
			}
			
			$query6 = "select * from student where p_id = '$id'";
			if($run = $conn->query($query6)){
				while($res4 = $run->fetch_assoc()){//fees_p,id(session)
					if($res4['fees_p'] == 'false'){
						echo "<marquee direction='UP' scrollamount='0'>We noticed that your fees are pending, please pay fees or you will be charged after due date.<br></marquee>";
					}
				}
			}else{
				echo mysqli_error($conn);
			}

			$sid = $_SESSION['p_sid'];
			$query7 = "select * from a_leave where s_id = '$sid' AND to_date >= '$date' AND `granted?` = 1";
			if($run = $conn->query($query7)){
				while($res5 = $run->fetch_assoc()){//fees_p,id(session)
					echo "<marquee direction='UP' scrollamount='0'>Faculty has granted your leave request, LeaveID = ".$res5['le_id'].". From-date = ".$res5['from_date'].". To-Date = ".$res5['to_date'].". Reason = ".$res5['reason'].". <br></marquee>";
				}
			}else{
				echo mysqli_error($conn);
			}

			$query7 = "select * from complaints where sid = '$sid' AND date >= '$b5day' AND r_flag = 'p'";
			if($run = $conn->query($query7)){
				while($res6 = $run->fetch_assoc()){//fees_p,id(session)
					echo "<marquee direction='UP' scrollamount='0'>--<br>There is a complaint about your child, by FacultyID = ".$res6['lid'].". Date = ".$res6['date'].". Details = ".$res6['details'].". <br></marquee>";
				}
				echo "<marquee direction='UP' scrollamount='0'>--</marquee>";
			}else{
				echo mysqli_error($conn);
			}

			$query7 = "select * from randomtest where s_id = '$sid' AND date >= '$b5day'";
			if($run = $conn->query($query7)){
				while($res7 = $run->fetch_assoc()){//fees_p,id(session)
					echo "<marquee direction='UP' scrollamount='0'>There was a surprise test, of ".$res7['subject'].". on ".$res7['date']." date. Organized by facultyID, ".$res7['l_id'].". and your child got ".$res7['marks']." marks.<br></marquee>";
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
	?>
	<hr style="width: 100%;">
<div class="container">
	
	<h1 style="width: 100%; ">-- Click Above Links To See Details --</h1><hr style="width: 400px">
	
	<ol style="width:500px; padding-left: 100px; float:left;" type="i">
		<li class="cl1"><a class='nav-item' href="disp/disp_stupnt.php">My Details</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_wtt.php">Weekly Time Table</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_ett.php">View mid sem exam time table</a></li> 
		<li class="cl1"><a class='nav-item' >Total Attendance = <?php @session_start(); $sid=$_SESSION['p_sid']; require('p/linked_conn.php'); $query="select * from `student` where `s_id` = '$sid'"; 
			if($run = $conn->query($query)){
				$run2 = $run->fetch_assoc();
				$_SESSION['total-att'] = $run2['total-att']; echo $_SESSION['total-att'];
			}else{ echo $conn->error; } //print_r($_SESSION); ?> </a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_mmarks.php">View mid-sem exam marks</a></li>
	</ol>

	<ol style="width:500px; padding-right:70px; float:right" type="i">
		<li class="cl1"><a class='nav-item' href="disp/disp_dsturec.php">Daily Student Record</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_ssturec.php">Semwise Student Record</a></li>
		<li class="cl1"><a class='nav-item' href="http://result2.gtu.ac.in/Default.aspx">GTU Result (on GTU site)</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_rtest.php">View surprise test marks</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_r_comp.php">View Complaints/Reply to Complaints</a></li>
	</ol>
</div><hr style="width: 100%; "><div class="container">
	
		<br><h1 style="width: 100%; float:left;"> -- Click Here To Submit Forms -- </h1><br><br><hr style="width: 400px">
		
		<ol style="width:500px; padding-left:100px; " type="i">
				<li class="cl1"><a class='nav-item' href="form/feedback.php">Feedback</a></li>
				<li class="cl1"><a class='nav-item' href="form/r_comp.php">Give Reply To A Complaint</a></li>
				<li class="cl1"><a class='nav-item' href="form/a_leave.php">Ask Leave</a></li>
				<li class="cl1"><a class='nav-item' href="p/pass_cg.php">Change password</a></li>
		</ol>
</div>
	<!-- about -->
	<!--<style type="text/css">.centered {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);

}</style>  position: fixed; -->
<!-- <div class="centered"> -->
<hr style="width: 100%">
<div class="about-w3-agile" id="about" style="float:left; width:100%; text-align: center;" >
	
	<div class="container" >
		<div class="wthree_about_grids" >
			<div class="col-md-6 wthree_about_grid_left" >
				<center>
					<h3>About linked</h3>
					<p>It is a college website, it improves transparency between faculty and parents of students.
						this system will send data to parents about student like, result details, mid semester result details, attendance days, homework is complete or not. and it also notifies about events,holidays,etc. and it allows parents to ask leave within 1 month.<?php //session_start(); print_r($_SESSION); ?></p>
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