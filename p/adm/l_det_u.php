<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Lecturer Details Update PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body> <!--//l_id, l_name,subj, exp, salary-->
	<h1 style="padding: 10px; margin:100px; ">
<?php 
session_start();
require("../linked_conn.php");
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'admin'){
		$l_id = mysqli_real_escape_string($conn, $_POST['l_id']);
		$l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
		$subj = mysqli_real_escape_string($conn, $_POST['subj']);
		$exp = mysqli_real_escape_string($conn, $_POST['exp']);
		$salary = mysqli_real_escape_string($conn, $_POST['salary']);
		$dept = mysqli_real_escape_string($conn, $_POST['dept']);
		if(!empty($l_id) && !empty($l_name) && !empty($subj) && !empty($exp) && !empty($salary) && !empty($dept)){
			if(trim($l_id) != "" && trim($l_name) != "" && trim($subj) != "" && trim($dept) != "" && trim($salary) != NULL && trim($exp) != NULL){
				// $query = "update lecturer set `l_name` = '$l_name',`dept` = '$dept', `subj` = '$subj', `exp` = '$exp', `salary` = '$salary' where `l_id` = '$l_id'";

				// if($res2 = $conn->query($query)){
				// 	echo "Update Lecturer Details Success ! -- Affected Rows -> ".mysqli_affected_rows($conn);
				// }else{
				// 	echo "Update Lecturer Details Failed ! -- MySql Error -> ".mysqli_error($conn);
				// }
				echo "exec";
			}else{
				echo "Please Don't Fill Form With Spaces !";
			}
		}else{
			echo "Please Enter All Fields !";
		}
		echo "<br><br> <a href='../../form/adm/l_det_u.php'>Go To Update_Lecturer_Details Form</a> <br><br> <a href='../../index.php'>Go To Main Page</a>";
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
