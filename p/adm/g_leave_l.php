<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Grant Leave For Faculty</title>
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
	if($_SESSION['utype'] == 'admin'){
		$le_id = mysqli_real_escape_string($conn, @$_POST['le_id']);
		$l_id = $_SESSION['id'];
		if(!empty($le_id)){
			if(trim($le_id) != NULL){
				$query1 = "update `a_leave_l` set `granted?` = 1 where `le_id` = '$le_id' AND `granted?` = 0";
				if($run1 = $conn->query($query1)){
					if(mysqli_affected_rows($conn) != 0){
						echo "Grant Success ! -- Updated Rows = ".mysqli_affected_rows($conn);
					}else{
						echo "Nothing Updated ! <br><br> Possible Reasons, <br><br>1.LeaveID is wrong.<br>2.Leave is already granted.";
					}
				}else{ echo "Grant Failed !".mysqli_error($conn); }
			}else{
				echo "You Have Entered White Spaces ! <br><br> You Will Be Redirected To 'Grant Leave' Page In 15 Seconds";
				header('Refresh:15; url= ../../form/adm/g_leave_l.php ',303,false);
			}
		}else{
			echo "Please Fill All Details ! <br><br> You Will Be Redirected To 'Grant Leave' Page In 15 Seconds";
			header('Refresh:15; url= ../../form/adm/g_leave_l.php ',303,false);
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