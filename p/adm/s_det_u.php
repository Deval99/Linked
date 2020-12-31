<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Student Details Update PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body> <!--//s_id, s_name, total-att, sem,dept,fees_p-->
	<h1 style="padding: 10px; margin:100px; ">
<?php 
session_start();
require("../linked_conn.php");
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'admin'){
		$s_id = mysqli_real_escape_string($conn, $_POST['s_id']);
		$s_name = mysqli_real_escape_string($conn, $_POST['s_name']);
		$total_att = mysqli_real_escape_string($conn, $_POST['total-att']);
		$sem = mysqli_real_escape_string($conn, $_POST['sem']);
		$dept = mysqli_real_escape_string($conn, $_POST['dept']);
		$fees_p = mysqli_real_escape_string($conn, $_POST['fees_p']);

		$query = "update student set `s_name` = '$s_name', `total-att` = '$total_att', `c_sem` = '$sem', `dept` = '$dept', `fees_p` = '$fees_p' where `s_id` = '$s_id'";

		if($res2 = $conn->query($query)){
			echo "Update Student Details Success ! -- Affected Rows -> ".mysqli_affected_rows($conn);
		}else{
			echo "Update Student Details Failed ! -- MySql Error -> ".mysqli_error($conn);
		}
		echo "<br><br> <a href='../../form/adm/s_det_u.php'>Go To Update_Student_Details Form</a> <br><br> <a href='../../index.php'>Go To Main Page</a>";
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
