<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Recruit Faculty PHP</title>
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
		$l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
		$subj = mysqli_real_escape_string($conn, $_POST['subj']);
		$subj2 = mysqli_real_escape_string($conn, $_POST['subj2']);
		$subj3 = mysqli_real_escape_string($conn, $_POST['subj3']);
		$subj4 = mysqli_real_escape_string($conn, $_POST['subj4']);
		$subj5 = mysqli_real_escape_string($conn, $_POST['subj5']);
		$subj6 = mysqli_real_escape_string($conn, $_POST['subj6']);
		$exp = mysqli_real_escape_string($conn, $_POST['exp']);
		$salary = mysqli_real_escape_string($conn, $_POST['salary']);
		$dept = mysqli_real_escape_string($conn, $_POST['dept']);

		if(!empty($l_id) && !empty($l_name) && !empty($subj) && !empty($exp) && !empty($salary) && !empty($dept)){
			if(trim($l_id) != NULL && trim($l_name) != NULL && trim($subj) != NULL && trim($exp) != NULL && trim($salary) != NULL && trim($dept) != NULL){
				$first = "select * from lecturer where l_id = '$l_id'";
				if($res2 = $conn->query($first)){
					$res1 = $res2->fetch_assoc();
						if(!empty($res1['l_id'])){
							die("This ID Is Taken ! <br><br> <a href='../../form/adm/r_le.php'>Go To Recruit_Lecturer</a> <br><br> <a href='../../index.php'>Go To Main Page</a>");
						}	
				}
				$query = "insert into lecturer (l_id,l_name,dept,subj,subj2,subj3,subj4,subj5,subj6,exp,salary) values('$l_id','$l_name','$dept','$subj','$subj2','$subj3','$subj4','$subj5','$subj6','$exp','$salary')";
				if($res19 = $conn->query($query)){
					echo "Lecturer Recruit Successful ! -- Rows Affected -> ".mysqli_affected_rows($conn)." <br><br> <a href='../../index.php'>Go To Main Page</a>";
				}else{
					echo "Lecturer Insert Failed ! -- Mysql Error -> ".mysqli_error($conn);
				}
			}else{
				echo "Please don't enter white spaces ! <br><br> You Will Be Redirected To form In 10 Seconds.";
				header("Refresh:10; url='../../form/adm/r_le.php'",303,false);
			}
		}else{
			echo "Please fill all details (subject 2 to subject 6 is not mandatory) ! <br><br> You Will Be Redirected To form In 10 Seconds.";
			header("Refresh:10; url='../../form/adm/r_le.php'",303,false);
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
