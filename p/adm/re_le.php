<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Remove Faculty PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body> 

	<h1 style="padding: 10px; margin:100px; ">
<?php 
session_start();
require("../linked_conn.php");
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'admin'){
		//l_id, l_name, subj, exp, salary
		$l_id = mysqli_real_escape_string($conn, $_POST['l_id']);
		
		$first = "select * from lecturer where l_id = '$l_id'";
		if($res2 = $conn->query($first)){
			$res1 = $res2->fetch_assoc();
			if(!empty($res1['l_id'])){
				$query = "delete from lecturer where l_id = '$l_id'";
				if($res19 = $conn->query($query)){
					echo "Lecturer Remove Successful ! -- Rows Affected -> ".mysqli_affected_rows($conn)." <br><br> <a href='../../index.php'>Go To Main Page</a>";
				}else{
					echo "Lecturer Remove Failed ! -- Mysql Error -> ".mysqli_error($conn);
				}
			}else{
				die("ID Doesn't Exist ! <br><br> <a href='../../form/adm/re_le.php'>Go To Remove_Lecturer</a> <br><br> <a href='../../index.php'>Go To Main Page</a>");
			}	
		}		
		//--------------------
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
