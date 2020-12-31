<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Add subject PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
      <link rel='stylesheet' href='style_link.css'>
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
		//sub_name, l_id, sem, dept

		$l_id = mysqli_real_escape_string($conn, @$_POST['l_id']);
		$sub_name = mysqli_real_escape_string($conn, @$_POST['sub_name']);
		$sem = mysqli_real_escape_string($conn, @$_POST['sem']);
		$dept = mysqli_real_escape_string($conn, @$_POST['dept']);

		if(!empty($l_id) && !empty($sub_name) && !empty($sem) && !empty($dept)){
			if(trim($l_id) != NULL && trim($sub_name) != NULL && trim($sem) != NULL && trim($dept) != NULL){
				$first = "select * from subjects where sub_name = '$sub_name' AND dept = '$dept'";
				if($res2 = $conn->query($first)){
					$res1 = $res2->fetch_assoc();
						if(!empty($res1)){
							die("This subject is already added ! <br><br> <a class='nav-item' href='../../form/adm/a_sub.php'>Go to Add subject</a> <br><br> <a class='nav-item' href='../../index.php'>Go To Main Page</a>");
						}
				}else{
					die("Mysql query failed, Error -> ".mysqli_error($conn));
				}
				$sec = "select * from lecturer where l_id = '$l_id' AND dept = '$dept'";
				if($res2 = $conn->query($sec)){
					$res1 = $res2->fetch_assoc();
					if(empty($res1['l_id'])){
						die("Lecturer/Professor doesn't exist in this department ! <br><br> <a class='nav-item' href='../../form/adm/a_sub.php'>Go to Add subject</a> <br><br> <a class='nav-item' href='../../index.php'>Go To Main Page</a>");
					}else{
						if($res1['subj'] != NULL){
							if($res1['subj2'] != NULL){
								if($res1['subj3'] != NULL){
									if($res1['subj4'] != NULL){
										if($res1['subj5'] != NULL){
											if($res1['subj6'] != NULL){
												die("This Lecturer/Professor have 6 subjects already ! Please recruit new Lecturer/Professor <br><br> <a class='nav-item' href='../../form/adm/a_sub.php'>Go to Add subject</a> <br><br> <a class='nav-item' href='../../index.php'>Go To Main Page</a>");
											}else{
												$third_ins = "update lecturer set subj6 = '$sub_name' where l_id = '$l_id'";
											}
										}else{
											$third_ins = "update lecturer set subj5 = '$sub_name' where l_id = '$l_id'";
										}
									}else{
										$third_ins = "update lecturer set subj4 = '$sub_name' where l_id = '$l_id'";
									}
								}else{
									$third_ins = "update lecturer set subj3 = '$sub_name' where l_id = '$l_id'";
								}
							}else{
								$third_ins = "update lecturer set subj2 = '$sub_name' where l_id = '$l_id'";
							}
						}else{
							$third_ins = "update lecturer set subj = '$sub_name' where l_id = '$l_id'";
						}
					}	
				}
				if(isset($third_ins)){
					if($res1 = $conn->query($third_ins)){
						echo "<br>Lecturer/Professor subject update success ! Rows affected -> ".mysqli_affected_rows($conn)."<br>";
					}else{
						die("Mysql Query failed , Error -> ".mysqli_error($conn)."<br><br> <a class='nav-item' href='../../form/adm/a_sub.php'>Go to Add subject</a> <br><br> <a class='nav-item' href='../../index.php'>Go To Main Page</a>");
					}
					$query = "insert into subjects (sub_name, l_id, sem, dept) values('$sub_name','$l_id','$sem','$dept')";
					if($res19 = $conn->query($query)){
						echo "Add subject successful ! -- Rows Affected -> ".mysqli_affected_rows($conn)." <br><br> <a class='nav-item' href='../../form/adm/a_sub.php'>Go to Add subject</a> <br><br><a class='nav-item' href='../../index.php'>Go To Main Page</a>";
					}else{
						echo "Add subject failed ! -- Mysql Error -> ".mysqli_error($conn);
					}
				}
			}else{
				echo "Please don't enter white spaces ! <br><br> You Will Be Redirected To form In 10 Seconds.";
				header("Refresh:10; url='../../form/adm/a_sub.php'",303,false);
			}
		}else{
			echo "Please fill all details ! <br><br> You Will Be Redirected To form In 10 Seconds.";
			header("Refresh:10; url='../../form/adm/a_sub.php'",303,false);
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
