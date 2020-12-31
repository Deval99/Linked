<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Delete Daily Student Record PHP</title>
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
  <!-- sid,date -->
<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer'){
		
		$sid2 = mysqli_real_escape_string($conn, @$_POST['sid']);
		$c_date = date('Y-m-d');

		$sid = strtoupper($sid2);
		$date = mysqli_real_escape_string($conn, @$_POST['date']);

		$dept = $_SESSION['dept'];
		if($date > $c_date){
			die('Date is greater than today !');
		}else{
			$dept = $_SESSION['dept'];
			//echo $date."--".$c_date;
			if(!empty($sid) || !empty($date)){
				if(trim($sid) != NULL || trim($date) != NULL){
						$first = "select * from dailysturec inner join student on student.s_id = dailysturec.s_id where dailysturec.s_id = '$sid' AND dailysturec.date = '$date' AND student.dept = '$dept'";
						if($res1 = $conn->query($first)){
							$stu_data = $res1->fetch_assoc();
							if($stu_data == NULL){
								die("Student Not Found In Your Department !! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/sstu_rec_d.php'>Go to Form</a>");
							}
						}else{
							die("Select Query Failed ! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/sstu_rec_d.php'>Go to Form</a>");
						}
						$query1 = "delete from `dailysturec` where s_id = '$sid' AND date = '$date'";
						if($run1 = $conn->query($query1)){
							echo "Delete Success ! - Affected Rows = ".mysqli_affected_rows($conn);
						}else{ echo "Delete Query Failed !".mysqli_error($conn); }
				}else{
					echo "You Have Entered White Spaces !";
				}

			}else{
				echo "Please Fill All Details !";
			}
			echo "<br><br> You Will Be Redirected To 'Delete Student Daily Record' Page In 15 Seconds";
			header('Refresh:15; url= ../../form/lec/dstu_rec_d.php ',303,false);
		}
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