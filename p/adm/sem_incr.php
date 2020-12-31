<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Sem Increment PHP</title>
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
		
		$sem = mysqli_real_escape_string($conn, $_POST['sem']);
		$dept = mysqli_real_escape_string($conn, $_POST['dept']);

		if($sem < 6){
			$date = Date('Y-m-d');
			$first = "update student set `c_sem` = `c_sem`+1 , `fees_p` = 'false' , `total-att` = 0 where `c_sem` = '$sem' AND `dept` = '$dept'";
			if($res1 = $conn->query($first)){
				
				echo "Sem Increment Success! -- Affected Rows -> ".mysqli_affected_rows($conn);
			}else{
				echo "Sem Increment Failed! -- MySql Error -> ".mysqli_error($conn);
			}
		}else{
			echo "You Can't Increment 6th Sem Students ! <br><br> <a href='../../index.php'>Go To Home Page</a> <br><br> <a href='../../form/adm/sem_incr.php'>Back To Form</a>";
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
