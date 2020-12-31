<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Surprise Test Marks Delete PHP</title>
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
	if($_SESSION['utype'] == 'lecturer'){
		
		$s_id2 = mysqli_real_escape_string($conn, @$_POST['s_id']);
		$t_id = mysqli_real_escape_string($conn, @$_POST['t_id']);

		$sid = strtoupper($s_id2);
		$dept = $_SESSION['dept'];
		$lid = $_SESSION['id'];
		//echo "date = ".$date."<br><br><br> php date".$pdate;
		//$b41y = date('Y-m-d', strtotime("$pdate -1 year"));
		if(!settype($t_id, "integer")){
			die("Test ID may contain charactors ! <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_d.php'>Go to Form</a><div class='made-with-love'>
								 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
								</div>");
		}
		//echo "<br><br><br> after -1 y ".$date;
		if(!empty($sid) && !empty($t_id)){
			if(trim($sid) != NULL && trim($t_id) != NULL){
				$first = "select * from randomtest where s_id = '$sid' AND t_id = $t_id AND l_id = '$lid'";
					if($res1 = $conn->query($first)){
						$data = $res1->fetch_assoc();
						if($data == NULL){
							die("No test record found !  <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_d.php'>Go to Form</a><div class='made-with-love'>
								 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
								</div>");
						}
						$qu = "delete from randomtest where s_id = '$sid' AND t_id = '$t_id' AND l_id = '$lid'";
						if($res1 = $conn->query($qu)){
							if(mysqli_affected_rows($conn) == 0){
								echo "Nothing deleted !";
							}else{
								echo "Delete success, Affected rows => ".mysqli_affected_rows($conn);
							}
						}
					}
			}else{
				echo "You Have Entered White Spaces !";
			}
		}else{
			echo "Please Fill All Details !";
		}
		echo "<br><br><a class='nav-item' href='../../index.php'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_d.php'>Go to form</a>";
			// if(!empty($sid) || !empty($subject) || !empty($date)){
			// 	if(trim($sid) != NULL || trim($subject) != NULL || trim($date) != NULL){
			// 			$first = "select * from student where s_id = '$sid' AND dept = '$dept'";
			// 			if($res1 = $conn->query($first)){
			// 				$stu_data = $res1->fetch_assoc();
			// 				if($stu_data == NULL){
			// 					die("Student Not Found In Your Department !! <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_s.php'>Go to Form</a>");
			// 				}
			// 			}

			// 			$query2 = "select * from randomtest where s_id = '$sid' AND date = '$date' AND subject = '$subject' AND l_id = '$l_id'";
			// 			if($res1 = $conn->query($query2)){
			// 				$stu_data = $res1->fetch_assoc();
			// 				if($stu_data != NULL){
			// 					die("Record Already Exists !! <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_s.php'>Go to Form</a>");
			// 				}
			// 			}
			// 			//t_id,l_id,s_id,subject,marks,date
			// 			$query1 = "insert into `randomtest`(`l_id`,`s_id`,`subject`,`marks`,`date`) values('$l_id','$sid','$subject','$marks','$date')";
			// 			if($run1 = $conn->query($query1)){
			// 				echo "Insert Success ! - Affected Rows = ".mysqli_affected_rows($conn);
			// 			}else{ echo "Insert Query Failed !".mysqli_error($conn); }
			
			// echo "<br><br> You Will Be Redirected To 'Surprise Test Marks Submit' Page In 15 Seconds";
			// header('Refresh:15; url= ../../form/lec/r_test_s.php ',303,false);
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