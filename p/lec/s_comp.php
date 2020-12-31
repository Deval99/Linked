<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Submit Complaint About Student</title>
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
<!-- le_id, s_id, reason, days, from_date, to_date-->
<?php
session_start();
require('../linked_conn.php');
?><!-- cid,sid,lid,date,details,r_flag --><?php
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer'){
		$date = date('Y-m-d');
		$sid = mysqli_real_escape_string($conn, @$_POST['sid']);
		$details = mysqli_real_escape_string($conn, @$_POST['details']);
		$lid = $_SESSION['id'];

		if(!empty($date) && !empty($sid) && !empty($lid) && !empty($details)){
			if(trim($date) != NULL && trim($details) != NULL && trim($lid) != NULL && trim($sid) != NULL){
				$query1 = "SELECT * from `complaints` where `sid` = '$sid' AND `lid` = '$lid' AND `date` = '$date'";
				if($run1 = $conn->query($query1)){
					$data = $run1->fetch_assoc();	
					if(empty($data)){
						$first = "select * from student where `s_id` = '$sid'";
						if($res = $conn->query($first)){
							$data = $res->fetch_assoc();
							if($data != NULL){
								$query = "insert into `complaints` (cid , sid, lid, date, details, r_flag) values (DEFAULT, '$sid', '$lid','$date', '$details','p')";
								//echo $sid."<br>".$reason."<br>".$days."<br>".$from."<br>".$to;
								if($run = $conn->query($query)){
									echo "Your Complaint Is Recieved ! <br><br> You Will Be Redirected To Main Page In 15 Seconds.";
									header('Refresh:15; url= ../../index.php ',303,false);
								}
								else { echo "Main Query Failed !".mysqli_error($conn);}
							}else{
								echo "Seems Like Student ID Doesn't Exist ! <br><br>You Will Be Redirected To 'Submit Complaints' In 15 Seconds.";
								header('Refresh:15; url= ../../form/lec/s_comp.php ',303,false);
							}
						}else{
							echo "Student Select Failed ! <br><br>You Will Be Redirected To 'Submit Complaints' In 15 Seconds.";
							header('Refresh:15; url= ../../form/lec/s_comp.php ',303,false);
						}
					}else{
						echo "You Can Complaint Only Once in a Day, Of 1 Student ! <br><br>You Will Be Redirected To Main Page In 15 Seconds.";
						header('Refresh:15; url= ../../index.php ',303,false);
					}
				}else{ echo "Retrieve Query Failed !".mysqli_error($conn); }
			}else{
				echo "You Have Entered White Spaces ! <br><br> You Will Be Redirected To 'Submit Complaints' Page In 15 Seconds";
				echo $from1."<br>".$to1;
				header('Refresh:15; url= ../../form/lec/s_comp.php ',303,false);
			}
		}else{
			echo "Please Fill All Details ! <br><br> You Will Be Redirected To 'Submit Complaints' Page In 15 Seconds";
			header('Refresh:15; url= ../../form/lec/s_comp.php ',303,false);
		}
	}else{
		echo "This Page Is Only For Lecturers/Faculty ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.";
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