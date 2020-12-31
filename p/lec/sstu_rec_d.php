<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Delete semwise student record PHP</title>
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
		
		$sid = mysqli_real_escape_string($conn, @$_POST['sid']);
		$sem = mysqli_real_escape_string($conn, @$_POST['sem']);

		if(!empty($sid) && !empty($sem)){
			if(trim($sid) != NULL && trim($sem) != NULL){
				if(!($sem < 1 || $sem > 6)){

					// $query2 = "select * from student where s_id = '$sid'";
					// if($res1 = $conn->query($query2)){
					// 	$stu_data = $res1->fetch_assoc();
					// 	if($stu_data == NULL){
					// 		die("Student Not Found !! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/sstu_rec_s.php'>Go to Form</a>");
					// 	}else{
					// 		$sem = $stu_data['c_sem'];
					// 		$total_att = $stu_data['total-att'];
					// 	}
					// }
					// $first = "select * from semwisesturec where s_id = '$sid' AND sem = '$sem'";
					// if($res2 = $conn->query($first)){
					// 	$data = $res2->fetch_assoc();
					// 	if($data == NULL){
					// 		die(" <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/sstu_rec_d.php'>Go to Form</a>");
					// 	}
					// }
					$query1 = "delete from `semwisesturec` where s_id = '$sid' AND sem = '$sem'";
					if($run1 = $conn->query($query1)){
						$rows = mysqli_affected_rows($conn);
						if($rows == 0){
							echo "Record doesn't exist !!";
						}else{
							echo "Delete success ! - Affected rows = ".$rows;
						}
					}else{ echo "Delete query failed !".mysqli_error($conn); }
				}else{
					echo "Sem Must be between 1 and 6 !";
				}
			}else{
				echo "You Have Entered White Spaces !";
			}

			}else{
				echo "Please Fill All Details !";
			}
			echo "<br><br> You Will Be Redirected To 'Delete Student Semwise Record' Page In 15 Seconds";
			header('Refresh:15; url= ../../form/lec/sstu_rec_d.php ',303,false);
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