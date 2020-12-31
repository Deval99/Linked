
<!DOCTYPE html>
<html lang="en">
<head>
<title>:: Linked Faculty Home ::</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Inspire Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="style_link.css" type="text/css" />
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
<style type="text/css"> li.cl1 {padding:10px; font-size:30px;} marquee{padding-left: 5% ; font-size: 20px; font-style: italic; } </style>	
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo-w3">
				<a class='nav-item' href="#about" class="scroll"><h1 style="color:#ffffff; margin-top:15px"><!--<img src="images/logo.png" alt="linked_Logo" style="height:70px;"/>-->linked <?php //session_start(); print_r($_SESSION); ?></h1></a>
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
								  	elseif ($_SESSION['utype'] == 'admin') {
								  		header('Location: admin.php');}				  	
							  	}else{
							  	echo "utype isn't set";
							  	}
							if (!isset($_SESSION['id'])){
							header("Location: index.php");}else{ echo "
					<li style='margin:10px'><a  href='p/logout.php'><span class='glyphicon glyphicon-user' aria-hidden='true'>".$_SESSION['id']."</span>Sign Out</a></li>
						"; }?>
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
 	<!--holiday, event, notice, complaints-->
	<hr style="width: 400px;">

			<?php 
				require('p/linked_conn.php');
				$date = date("Y-m-d");

				$query3 = "select * from holiday where date >= '$date'";

				if($run = $conn->query($query3)){
					while($res = $run->fetch_assoc()){//hid,days,occ,date
							echo "<marquee direction='UP' scrollamount='0'>We need to inform you that there is a holiday on ".$res['date'].". Reason: '".$res['occ']."'. For ".$res['days']." days. <br></marquee>";
					}
				}

				$query4 = "select * from event where date >= '$date'";

				if($run = $conn->query($query4)){
					while($res2 = $run->fetch_assoc()){//e_id,date,detail
							echo "<marquee direction='UP' scrollamount='0'>we need to inform you that there is an event on ".$res2['date']."  Event title : '".$res2['e_name']."'. Details: ".$res2['detail']." <br></marquee>";
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
				$query7 = "select * from complaints where lid = '$id'";
				$b1day = date('Y-m-d',strtotime("-1 day",strtotime($date)));
				if($run = $conn->query($query7)){
					
					while($res7 = $run->fetch_assoc()){
						$cid = $res7['cid'];
						$query6 = "select * from r_complaints where date >= '$date' AND cid = $cid";
						
						if($run2 = $conn->query($query6)){
						
							while($res4 = $run2->fetch_assoc()){//nid,title,date,details
									echo "<marquee direction='UP' scrollamount='0'>--<br>Parents gave reply to your complaint : ID = ".$res4['cid'].", Details: ".$res4['details'].". Date : ".$res4['date'].".<br></marquee>";
							}
						}
					}
					echo "<marquee direction='UP' scrollamount='0'>--</marquee>";
				}else{
					echo mysqli_error($conn);
				}
			?>
			
	<hr style="width: 100%;">
<div class="container">
	
	<h1 style="width: 100%; ">-- Click Above Links To See Details --</h1><hr style="width: 400px">
	<ol style="width:1000px; padding-left: 100px; float:left;" type="i">
		<li class="cl1"><a class='nav-item' class='nav-item' href="disp/disp_stupnt.php">Student &amp; Parent Details (Only For Your Department)</a></li>
		<li class="cl1"><a class='nav-item' href="disp/le_list.php">My Details</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_r_comp.php">View Complaints/Reply To Complaints</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_mmarks.php">View mid-sem exam marks</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_wtt.php">Weekly Time Table</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_ett.php">View mid sem exam time table</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_dsturec.php">Daily Student Record</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_ssturec.php">Semwise Student Record</a></li>
		<li class="cl1"><a class='nav-item' href="http://result2.gtu.ac.in/Default.aspx">GTU Result (on GTU site)</a></li>
		<li class="cl1"><a class='nav-item' href="disp/disp_rtest.php">View surprise test marks</a></li>
	</ol>
	
</div><hr style="width: 100%; "><div class="container">
	
		<br><h1 style="width: 100%; float:left;"> -- Click Here To Submit Forms -- </h1><br><br><hr style="width: 400px">
		
	<ol style="width:55%; padding-left: 5%; float:left;" type="i">
		<li class="cl1"><a class='nav-item' href="form/lec/s_comp.php">Submit A Complaint</a></li>
		<li class="cl1"><a class='nav-item' href="form/lec/dstu_rec_sn.php">Daily Student Record Submit</a></li>
		<?php 
		$l_id = $_SESSION['id']; 
		$que = "select * from HOD where l_id = '$l_id'"; 

		if($res2 = $conn->query($que)){ 
			$data = $res2->fetch_assoc(); 
			if(!empty($data)){ 
				$_SESSION['hod'] = true;
				echo"
				<li class='cl1'><a class='nav-item' href='form/ch/index.php?ch=sstu_rec_s'>Semwise Student Record Submit</li>
				<li class='cl1'><a class='nav-item' href='form/ch/index.php?ch=sstu_rec_d'>Semwise Student Record Delete</li>
				";
			}
		}else{ 
			echo "<li class='cl1'>Can't show Semwise student record submit ! Please contact admin for more info.</li>"; 
		}
		?>
		<li class="cl1"><a class='nav-item' href="form/ch/index.php?ch=m_marks_s">Mid Marks Submit</a></li>
		<li class="cl1"><a class='nav-item' href="form/ch/index.php?ch=m_marks_d">Delete mid marks</a></li>
		<li class="cl1"><a class='nav-item' href="form/lec/a_leave_l.php">Ask For Leave</a></li>
		<!-- !!!OLD!!! <li class="cl1"><a class='nav-item' href="form/lec/sstu_rec_d.php">Delete semwise student record</a></li> -->
		<!-- <li class="cl1"><a class='nav-item' href="form/lec/dstu_rec_s.php">Daily Student Record Submit</a></li> -->
		
		<!-- <li class="cl1"><a class='nav-item' href="form/lec/dstu_rec_d.php">Delete daily student record</a></li> 
		_____________

		<button formaction='form/ch/index.php?ch=sstu_rec_d'>Semwise Student Record Delete !</button>
___________________________
	
		USELESS <li class='cl1'><a class='nav-item' href='form/lec/sstu_rec_s.php'>Semwise Student Record Submit(of current sem)</a></li> 
				<li class='cl1'><a class='nav-item' href='form/lec/sstu_rec_sb.php'>Semwise Student Record Submit(of current semester)</a></li>
				<li class='cl1'><a class='nav-item' href='form/lec/sstu_rec_so.php'>Semwise Student Record Submit(Manually Single student at a time)</a></li>
				<li class='cl1'><a class='nav-item' href='form/lec/sstu_rec_d.php'>Semwise Student Record Delete</a></li>
				<li class='cl1'><a class='nav-item' href='form/lec/sstu_rec_db.php'>Semwise Student Record Delete(Bulk)</a> </li> 
		-->
	</ol>

	<ol style="width:45%; padding-right:5%; float:right" type="i">
		<li class="cl1"><a class='nav-item' href="form/lec/g_leave.php">Grant Student Leave</a></li>
		
		
		<li class="cl1"><a class='nav-item' href="form/ch/index.php?ch=r_test_s">Surprise test marks submit</a></li>
		<li class="cl1"><a class='nav-item' href="form/ch/index.php?ch=r_test_d">Surprise test marks delete</a></li>

		
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
<!-- <div class="centered"> 


_________________
r_test 4 links

<li class="cl1"><a class='nav-item' href="form/lec/r_test_s.php">Surprise Test Marks Submit (Single)</a></li>
		<li class="cl1"><a class='nav-item' href="form/lec/r_test_sn.php">Surprise Test Marks Submit (Bulk)</a></li>
		<li class="cl1"><a class='nav-item' href="form/lec/r_test_d.php">Delete surprise test marks (single)</a></li>
		<li class="cl1"><a class='nav-item' href="form/lec/r_test_db.php">Delete surprise test marks (bulk)</a></li>
	-->


<hr style="width: 100%">
<div class="about-w3-agile" id="about" style="float:left; width:100%; text-align: center;" >
	
	<div class="container" style="width:50%; float:left; padding-left:5%; margin-right:5%">
		<div class="wthree_about_grids" >
			<div class="col-md-6 wthree_about_grid_left" style="width:100%;">
				<center>
					<h3>About linked</h3>
					<p>It is a college website, it improves transparency between faculty and parents of students.
						this system will send data to parents about student like, result details, mid semester result details, attendance days, homework is complete or not. and it also notifies about events,holidays,etc. and it allows parents to ask leave within 1 month.</p>
				</center>
			</div>
		</div>
	</div>
		<!--Contact-->
		<div class="contact-w3-agileits"  id="contact" style="width:40%; float:right;margin-top:0px; padding-top:0px;" >
			<div class="container" style="width:100%;" style="width:40%; float:right;">
				<div class="col-md-5 contact-left-w3ls" style="width:100%;">
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
			<div class="clearfix"></div>
		<!-- </div> -->
	<!--Footer-->
<div class="footer-w3l" style="width: 100%;">
	<p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p> 
</div>
<!-- style="width: 1280px;" -->