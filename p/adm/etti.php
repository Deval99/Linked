<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Admission Cancel PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body> <!--uid,subject,dept,time,date-->
	<h1 style="padding: 10px; margin:100px; ">
<?php 
session_start();
require("../linked_conn.php");
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'admin'){
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$dept = mysqli_real_escape_string($conn, $_POST['dept']);
		$time = mysqli_real_escape_string($conn, $_POST['time']);
		$date = mysqli_real_escape_string($conn, $_POST['date']);
		$sem = mysqli_real_escape_string($conn, $_POST['sem']);
		if(!empty($subject) || !empty($dept) || !empty($time) || !empty($date) || !empty($sem)){
			$first = "select * from examtimetable where `sem` = $sem AND `subject` = '$subject' AND `dept` = '$dept' AND `time` = '$time' AND `date` = '$date'";
			if($res2 = $conn->query($first)){
				while($res1 = $res2->fetch_assoc()){
					if($res1 != NULL){
						die("You Have Entered This Examination Details Already ! <br><br> <a href='../../form/adm/ettu.php'>Go To Exam_TimeTable_Update </a> <br><br> <a href='../../index.php'>Go To Main Page</a>");
					}
				}
			}

			$query = "insert into examtimetable (uid,subject,sem,dept,time,date) values(DEFAULT, '$subject','$sem', '$dept', '$time', '$date')";
			if($res19 = $conn->query($query)){
				echo "Time Table Update Successful ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br> <a href='../../form/adm/ettu.php'>Go To Exam_TimeTable_Update </a> <br><br> <a href='../../index.php'>Go To Main Page</a>";
			}
		}else{
			echo "Please Fill All Fields ! <br><br> You Will Be Redirected To Add_Exam_Time_Table Form In 10 Seconds.";
			header("Refresh:10; url='../../form/adm/etti.php'");
		}
	}else{
		echo "This Page Is Only For Admin ! <br><br> You Will Be Redirected To Main Page In 10 Seconds.";
		header("Refresh:10; url='../../index.php'",303,false);
	}
}else{
	echo "Please Login First ! <br><br> You Will Be Redirected To Main Page In 10 Seconds.";
	header("Refresh:10; url='../../index.php'",303,false);
}
?>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='../disp/disp/js/index.js'></script>
</body>
</html>
