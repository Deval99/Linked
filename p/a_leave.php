<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Ask Leave For Student</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
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
require('linked_conn.php');

if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'parent'){
		$date = date('Y-m-d');
		$pid = $_SESSION['id'];
		$sid = $_SESSION['p_sid'];
		$reason1 = $_POST['reason'];
		$reason = mysqli_real_escape_string($conn, $reason1);
		$from1 = $_POST['from'];
		$to1 = $_POST['to'];
		$from = strtotime($from1);
		$to = strtotime($to1);
		$l_id = mysqli_real_escape_string($conn, $_POST['l_id']);
		$dept = $_SESSION['dept'];

		$first = "select * from lecturer where l_id = '$l_id' AND dept = '$dept'";
		if($run2 = $conn->query($first)){
			$data = $run2->fetch_assoc();
			if(empty($data)){
				die("No Lecturer/Professor Found In Your Department, Please Enter Valid Faculty ID ! <br><br><a href='../form/a_leave.php'>Go To Form</a> <br><br> <a href='../index.php'>Go To Main Page</a>");
			}
		}
		if(!(strlen($reason) > 20)){
		if($from1 != $to1){
			if($from < $to){
				$query1 = "SELECT * from `a_leave` where `s_id` = '$sid' AND `from_date` = '$from1' AND `to_date` = '$to1'";
				if($run1 = $conn->query($query1)){
					$data = $run1->fetch_assoc();	
					if(empty($data)){
						$query = "insert into `a_leave` (le_id , s_id, l_id, reason, from_date, to_date) values (DEFAULT, '$sid', '$l_id','$reason', '$from1','$to1')";
						//echo $sid."<br>".$reason."<br>".$days."<br>".$from."<br>".$to;
						if($run = $conn->query($query)){
							echo "Your Request Is Recieved ! If Faculty Grant Your Leave Then You Will Get Notification Else Leave Is Not Granted <br><br> You Will Be Redirected To Main Page In 15 Seconds.";
							header('Refresh:15; url= ../index.php ',303,false);
						}
						else { echo "Main Query Failed !".mysqli_error($conn);}
					}else{
						print_r($data);
						echo "<br><br>Your Request Is Recieved Already ! If Lecturer Grant Your Leave Then You Will Get Notification Else Leave Is Not Granted <br><br>You Will Be Redirected To Main Page In 15 Seconds.";
						//echo $from1."<br>".$to1."<br>".gettype($from1);
						header('Refresh:15; url= ../index.php ',303,false);
					}
				}else{ echo "Retrieve Query Failed !".mysqli_error($conn); }
			}else{
				echo "You Have Entered Invalid Dates ! <br><br> You Will Be Redirected To 'Ask Leave' Page In 15 Seconds";
				echo $from1."<br>".$to1;
				header('Refresh:15; url= ../form/a_leave.php ',303,false);
			}
		}else{
			echo "You Have Entered Same Dates ! <br><br> You Will Be Redirected To 'Ask Leave' Page In 15 Seconds";
			header('Refresh:15; url= ../form/a_leave.php ',303,false);
		}
	}else{
		echo "Please Don't Touch HyperText !";
	}
	}else{
		echo "This Page Is Only For Parents ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.";
		header('Refresh:3; url= ../index.php ',303,false);
	}
}else{
	echo "Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.";
	header('Refresh:3; url= ../index.php ',303,false);
}
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../disp/disp/js/index.js'></script>

</body>
</html>