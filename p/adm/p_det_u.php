<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Parents Details Update PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body> <!--//e_id,e_name,date,detail-->
	<h1 style="padding: 10px; margin:100px; ">
<?php 
session_start();
require("../linked_conn.php");
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'admin'){
		$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
		$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
		
		$cont_no = mysqli_real_escape_string($conn, $_POST['cont_no']);

		$query = "update parents set `p_name` = '$p_name', `cont_no` = '$cont_no' where `p_id` = '$p_id'";

		if($res2 = $conn->query($query)){
			echo "Update Parents Details Success ! -- Affected Rows -> ".mysqli_affected_rows($conn);
		}else{
			echo "Update Parents Details Failed ! -- MySql Error -> ".mysqli_error($conn);
		}
		echo "<br><br> <a href='../../form/adm/p_det_u.php'>Go To Update_Parents_Details Form</a> <br><br> <a href='../../index.php'>Go To Main Page</a>";
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
