<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Semwise Student Record Submit PHP</title>
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
		$spi = mysqli_real_escape_string($conn, @$_POST['spi']);
		$performance_status = mysqli_real_escape_string($conn, @$_POST['performance-status']);
		$dept = $_SESSION['dept'];
		$sem = (int)mysqli_real_escape_string($conn, @$_POST['sem']);
		$total_att = (int)mysqli_real_escape_string($conn, @$_POST['total_attend']);
		//sem, total-att

		if(!empty($sid) && !empty($spi) && !empty($performance_status) && !empty($sem)){
			if(trim($sid) != NULL && trim($spi) != NULL && trim($performance_status) != NULL && trim($sem) != NULL){
				if($total_att > 150 || $total_att < 0){
					die("Attenddance days must be between 0 to 150 ! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/sstu_rec_so.php'>Go to Form</a>");
				}
				if(!($spi < 0 && $spi > 10)){
				  if($sem > 6 || $sem < 1){
				  	die('Semester is incorrect !!');
				  }
					$query2 = "select * from student where s_id = '$sid' && dept = '$dept'";
					if($res1 = $conn->query($query2)){
						$stu_data = $res1->fetch_assoc();
						if($stu_data == NULL){
							die("Student Not Found in your department !! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/sstu_rec_so.php'>Go to Form</a>");
						}
						if($stu_data['c_sem'] <= $sem){
							die("This student is studying in (".$stu_data['c_sem'].")st/nd/rd/th semester. and you are trying to enter Record of (".$sem.")nd/rd/th semester !");
						}
					}
					$first = "select * from semwisesturec where s_id = '$sid' AND sem = '$sem'";
					if($res2 = $conn->query($first)){
						$data = $res2->fetch_assoc();
						if($data != NULL){
							die("Record Already Exists !! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/sstu_rec_so.php'>Go to Form</a>");
							//print_r("qew".$data);
						}
					}
					$query1 = "insert into `semwisesturec`(`s_id`,`sem`,`total-attend`,`spi`,`performance-status`) values('$sid','$sem','$total_att','$spi','$performance_status')";
					if($run1 = $conn->query($query1)){
						echo "Insert Success ! - Affected Rows = ".mysqli_affected_rows($conn);
					}else{ echo "Insert Query Failed !".mysqli_error($conn); }
				  
				}else{
					echo "SPI Must be between 0 and 10 !";
				}
			}else{
				echo "You Have Entered White Spaces !";
			}

			}else{
				echo "Please Fill All Details !";
			}
			echo "<br><br> You Will Be Redirected To 'Student Semwise Record Submit (of previous sem)' Page In 15 Seconds<br> <a href='../../index.php'>Go to Main Page</a> <br>";
			header('Refresh:15; url= ../../form/lec/sstu_rec_soo.php ',303,false);
			
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