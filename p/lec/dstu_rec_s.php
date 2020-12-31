<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Daily Student Record Submit</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<!-- follow me template -->
<h1 style="padding: 10px; margin:100px; ">
<!-- sid,present?,date,home-work -->
<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer'){
		
		$sid2 = mysqli_real_escape_string($conn, @$_POST['sid']);
		$present2 = mysqli_real_escape_string($conn, @$_POST['present?']);
		$home_work2 = mysqli_real_escape_string($conn, @$_POST['home_work']);
		$date = date('Y-m-d');
		$sid = strtoupper($sid2);
		$present = strtoupper($present2);
		$home_work = strtoupper($home_work2);
		$dept = $_SESSION['dept'];

		if(!empty($sid) || !empty($present) || !empty($home_work)){
			if(trim($sid) != NULL || trim($present) != NULL || trim($home_work) != NULL){
					$first = "select * from student where s_id = '$sid' AND dept = '$dept'";
					if($res1 = $conn->query($first)){
						$stu_data = $res1->fetch_assoc();
						if($stu_data == NULL){
							die("Student Not Found In Your Department !! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/sstu_rec_s.php'>Go to Form</a>");
						}
					}

					$query2 = "select * from dailysturec where s_id = '$sid' AND date = '$date'";
					if($res1 = $conn->query($query2)){
						$stu_data = $res1->fetch_assoc();
						if($stu_data != NULL){
							die("Record Already Exists !! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/dstu_rec_s.php'>Go to Form</a>");
						}
					}
					$query1 = "insert into `dailysturec`(`s_id`,`present?`,`date`,`home-work`) values('$sid','$present','$date','$home_work')";
					if($run1 = $conn->query($query1)){
						echo "Insert Success ! - Affected Rows = ".mysqli_affected_rows($conn);
						if($present == 'TRUE'){
							$update = "update `student` set `total-att` = `total-att`+1 where `s_id` = '$sid'";
							if($run2 = $conn->query($update)){
								if(mysqli_affected_rows($conn) == 0){
									echo "<br>Student Attendance Increment Failed !";
								}else{
									echo "<br>Student Attendance Increment Success ! -- Rows Affected = ".mysqli_affected_rows($conn);
								}
							}
						}
					}else{ echo "Insert Query Failed !".mysqli_error($conn); }
			}else{
				echo "You Have Entered White Spaces !";
			}

			}else{
				echo "Please Fill All Details !";
			}
			echo "<br><br> You Will Be Redirected To 'Student Daily Record Submit' Page In 15 Seconds";
			header('Refresh:15; url= ../../form/lec/dstu_rec_s.php ',303,false);
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