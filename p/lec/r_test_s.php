<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Surprise test marks Submit</title>
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
<h1 style="padding: 10px; margin:100px; ">
<!-- t_id,l_id,s_id,subject,marks,date -->
<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer'){
		
		$s_id2 = mysqli_real_escape_string($conn, @$_POST['s_id']);
		$tid = mysqli_real_escape_string($conn, @$_POST['t_id']);
		$subject2 = mysqli_real_escape_string($conn, @$_POST['subject']);
		$tmarks = mysqli_real_escape_string($conn, @$_POST['t_marks']);
		settype($tmarks, "integer");
		$marks = mysqli_real_escape_string($conn, @$_POST['marks']);
		
		$l_id = $_SESSION['id'];
		$sid = strtoupper($s_id2);
		settype($tid, "integer");
		$subject = strtoupper($subject2);
		$dept = $_SESSION['dept'];
		//print_r($_POST);
		if(!empty($sid) && !empty($subject) && !empty($marks) && !empty($tmarks) && !empty($tid)){
			if(trim($sid) != NULL && trim($subject) != NULL && trim($marks) != NULL && trim($tmarks) != NULL && trim($tid) != NULL){
				$first = "select * from student where s_id = '$sid' AND dept = '$dept'";
				if($res1 = $conn->query($first)){
					$stu_data = $res1->fetch_assoc();
					if($stu_data == NULL){
						die("Student Not Found In Your Department !! <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_s.php'>Go to Form</a><div class='made-with-love'>
							 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
							</div>");
					}
				}
				$query2 = "select * from randomtest where s_id = '$sid' AND t_id = '$tid' AND l_id = '$l_id'";
				if($res1 = $conn->query($query2)){
					$stu_data = $res1->fetch_assoc();
					if($stu_data != NULL){
						die("Record Already Exists !! <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_s.php'>Go to Form</a><div class='made-with-love'>
							 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
							</div>");
					}
				}

				$q3 = "select * from randomtest where t_id = '$tid' AND subject != '$subject'";
				if($res1 = $conn->query($q3)){
					$stu_data = $res1->fetch_assoc();
					if($stu_data != NULL){
						die("Please enter different Test ID !! <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_s.php'>Go to Form</a><div class='made-with-love'>
							 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
							</div>");
					}
				}
				//t_id,l_id,s_id,subject,marks,date
				$date = Date('Y-m-d');
				$query1 = "insert into `randomtest`(`t_id`,`l_id`,`s_id`,`subject`,`marks`,`t_marks`,`date`) values('$tid','$l_id','$sid','$subject','$marks','$tmarks','$date')";
				if($run1 = $conn->query($query1)){
					echo "Insert Success ! - Affected Rows = ".mysqli_affected_rows($conn);
				}else{ echo "Insert Query Failed !".mysqli_error($conn); }
			}else{
				echo "You Have Entered White Spaces !";
			}
			}else{
				echo "Please Fill All Details !";
			}
			echo "<br><br><a class='nav-item' href='../../index.php'>Go to home</a><br><br><a href='../../form/lec/r_test_s.php'>Go to form</a>";
		}else{
			echo "This Page Is Only For Faculty ! <br><br><a class='nav-item' href='../../index.php'>Go to home</a><br><br><a href='../../form/lec/r_test_s.php'>Go to form</a>";
		}
	}else{
		echo "Please Login First ! <br><br><a class='nav-item' href='../../index.php'>Go to home</a><br><br><a href='../../form/lec/r_test_s.php'>Go to form</a>";
	}
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../../disp/disp/js/index.js'></script>

</body>
</html>