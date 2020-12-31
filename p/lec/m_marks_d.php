<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Mid-sem Marks Delete PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/css/style.css'>
      <link rel='stylesheet' href='style_link.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<!-- follow me template -->
<h1 style="padding: 10px; margin:100px; text-transform: initial; ">
<!-- t_id,l_id,s_id,subject,marks,date -->

<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer' && $_SESSION['hod'] == true){
		
		$s_id2 = mysqli_real_escape_string($conn, @$_POST['s_id']);
		//$subject = mysqli_real_escape_string($conn, @$_POST['subject']);
		
		$pdate = date('Y-m-d');
		$l_id = $_SESSION['id'];
		$sid = strtoupper($s_id2);
		$dept = $_SESSION['dept'];
		$lid = $_SESSION['id'];
		//echo "date = ".$date."<br><br><br> php date".$pdate;
		$b41y = date('Y-m-d', strtotime("$pdate -1 year"));
		$sem = mysqli_real_escape_string($conn ,@$_POST['sem']);
		//echo "<br><br><br> after -1 y ".$date;
		if(!empty($sid) && !empty($sem)){
			if(trim($sid) != NULL && trim($sem) != NULL){
				// $first1 = "select * from subjects where sub_name = '$subject'";
				// if($res2 = $conn->query($first1)){
				// 	$sub_det = $res2->fetch_assoc();
				// 	if($sub_det == NULL){
				// 		die("Can't fetch subject details !  <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/m_marks_d.php'>Go to Form</a>");
				// 	}
				// 	$sem = $sub_det['sem'];
				// }else{
				// 	die("fetch subject details query failed ! ".mysqli_error($conn)." <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/m_marks_d.php'>Go to Form</a>");
				// } AND subject = '$subject'
				$first = "select * from midmarks where s_id = '$sid'  AND sem = '$sem' AND dept = '$dept'";
				if($res1 = $conn->query($first)){
					$data = $res1->fetch_assoc();
					if($data == NULL){
						die("No exam record found in your department ! Check if student id and sem is correct. <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/m_marks_d.php'>Go to Form</a><div class='made-with-love'>
											 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
											</div>");
					}
					$qu = "delete from midmarks where s_id = '$sid' AND sem = '$sem' AND dept = '$dept'";
					if($res1 = $conn->query($qu)){
						echo "Delete success, Affected rows => ".mysqli_affected_rows($conn);
					}else{
						echo "Delete failed, Mysql error => ".mysqli_error($conn);
					}
				}
			}else{
					echo "You Have Entered White Spaces !";
			}
		}else{
			echo "Please Fill All Details !";
		}
		echo "<br><br><a class='nav-item' href='../../index.php'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_d.php'>Go to form</a>";
		}else{
			echo "This Page Is Only For Faculty ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.";
			header('Refresh:3; url= ../../index.php ',303,false);
		}
	}else{
		echo "Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.";
		header('Refresh:3; url= ../../index.php ',303,false);
	}
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../../disp/disp/js/index.js'></script>

</body>
</html>