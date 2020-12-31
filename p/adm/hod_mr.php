<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Make HOD PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/css/style.css'>
      <link rel='stylesheet' href='style_link.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<!-- follow me template -->
<h1 style="padding: 10px; margin:100px; text-transform: initial; ">
<!-- t_id,l_id,s_id,subject,marks,date -->

<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'admin'){
		
		$l_id = strtoupper(mysqli_real_escape_string($conn, @$_POST['l_id']));

		if(!empty($l_id) ){
			if(trim($l_id) != NULL){
				$first1 = "select * from lecturer where l_id = '$l_id'";
				if($res2 = $conn->query($first1)){

					$sub_det = $res2->fetch_assoc();
					if($sub_det == NULL){

						die("Lecturer/Professor doesn't exist !  <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/adm/hod_mr.php'>Go to Form</a>");
					}
					$dept = $sub_det['dept'];
				}else{
					die("fetch Lecturer/Professor details query failed ! ".mysqli_error($conn)." <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/adm/hod_mr.php'>Go to Form</a>");
				}
				// $first = "select * from HOD where l_id = '$l_id'";
				// if($res1 = $conn->query($first)){
				// 	$data = $res1->fetch_assoc();
				// 	if($data != NULL){
				// 		$sec = "delete from HOD where l_id = '$l_id'";
				// 		if($res1 = $conn->query($sec)){
				// 			echo "Remove success !, Affected rows -> ".mysqli_affected_rows($conn);
				// 		}else{
				// 			echo "Remove failed ! -> ".mysqli_error($conn);
				// 		}
				// 	}
				// }
				$first = "select * from HOD where department = '$dept'";
				if($res1 = $conn->query($first)){
					$data = $res1->fetch_assoc();
					if($data == NULL){
						$sec = "insert into HOD( l_id, department) values( '$l_id', '$dept')";
						if($res1 = $conn->query($sec)){
							echo "Insert success !, Affected rows -> ".mysqli_affected_rows($conn);
						}else{
							echo "Insert failed ! -> ".mysqli_error($conn);
						}
					}else{
						$third = "update HOD set l_id = '$l_id' where department = '$dept'";
						if($res1 = $conn->query($third)){
							echo "Update success !, Affected rows -> ".mysqli_affected_rows($conn);
						}else{
							echo "Update failed ! -> ".mysqli_error($conn);
						}
					}
				}

			}else{
				echo "You Have Entered White Spaces !";
			}
		}else{
			echo "Please Fill All Details !";
		}
		echo "<br><br><a class='nav-item' href='../../index.php'>Go to main page</a><br><br><a class='nav-item' href='../../form/adm/hod_mr.php'>Go to form</a>";
		}else{
			echo "This Page Is Only For Admin ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.";
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