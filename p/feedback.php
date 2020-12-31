<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Feedback</title>
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
<!-- f_id, p_id, subject, details, date -->
<?php
session_start();
require('linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'parent'){
		$date = date('Y-m-d');
		$pid = $_SESSION['id'];
		$query1 = "SELECT * from `feedback` where `date` = '$date' && `p_id` = '$pid'";
		if($run1 = $conn->query($query1)){
			$data = $run1->fetch_assoc();	
			if(!($data['date'] == $date)){
				$sub = mysqli_real_escape_string($conn, $_POST['subject']);
				$det = mysqli_real_escape_string($conn, $_POST['details']);
				if(empty($sub) && empty($det)){
					echo "!!! Post variables are empty !!! ";
				} else {
					$query = "INSERT INTO `feedback` (`f_id`, `p_id`, `subject`, `details`, `date`) values(DEFAULT,'$pid','$sub','$det','$date')";
					if ($run = $conn->query($query)) {
						echo "Thank You For Your feedback, It Is Valueable For Us ! <br><br> You Will Be Redirected To Main Page After 10 Seconds.";
						header("Refresh:10; url= ../index.php",303,false);
					}else{
						echo "Unsuccessful".mysqli_error($conn);
					}
				}
			}else{
				echo "Sorry, You Can't Submit Multiple Feedbacks In 1 Day ! <br><br> You Will Be Redirected To Main Page After 10 Seconds.";
				header('Refresh:10; url= ../index.php ',303,false);
			}
		}else{
			echo "Error in checking database !".mysqli_error($conn);
		}
	}else{
		echo "This Page Is Only For Parents ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.";
		header('Refresh:3; url= ../index.php ',303,false);
	}
}else{
	echo "Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.";
	header('Refresh:3; url= ../index.php ',303,false);
}
?>
</h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='disp/js/index.js'></script>

</body>
</html>



