<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Remove subject PHP</title>
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
		$sub_name = mysqli_real_escape_string($conn, @$_POST['sub_name']);
		$l_id = mysqli_real_escape_string($conn, @$_POST['l_id']);
		if(!empty($sub_name)){
			if(trim($sub_name) != NULL){
				$zero = "select * from lecturer where l_id = '$l_id' AND subj = '$sub_name' OR subj2 = '$sub_name' OR subj3 = '$sub_name' OR subj4 = '$sub_name' OR subj5 = '$sub_name' OR subj6 = '$sub_name'";
				//$zero = "SELECT * FROM lecturer WHERE l_id =  'L01' AND subj =  'ACP' OR subj2 =  'ACP' OR subj3 =  'ACP' OR subj4 =  'ACP' OR subj5 =  'ACP' OR subj6 =  'ACP'";
				if($res2 = $conn->query($zero)){
					$res1 = $res2->fetch_assoc();
						if(empty($res1)){
							die("Subject doesn't relate to Lecturer/Professor ID ! Please check Lecturer ID or Subject name. <br><br> <a class='nav-item' href='../../form/adm/r_sub_l.php'>Go to Remove subject</a> <br><br> <a class='nav-item' href='../../index.php'>Go To Main Page</a>");
						}else{
							$l_id = $res1['l_id'];
							if($res1['subj'] != $sub_name){
								if($res1['subj2'] != $sub_name){
									if($res1['subj3'] != $sub_name){
										if($res1['subj4'] != $sub_name){
											if($res1['subj5'] != $sub_name){
												if($res1['subj6'] == $sub_name){
													$sub = "subj6";
												}
											}else{
												$sub = "subj5";
											}
										}else{
											$sub = "subj4";
										}
									}else{
										$sub = "subj3";
									}
								}else{
									$sub = "subj2";
								}
							}else{
								$sub = "subj";
							}
						}
				}else{
					die("Mysql query failed, Error -> ".mysqli_error($conn));
				}
				$first = "update lecturer set $sub = NULL where l_id = '$l_id'";
				if($res2 = $conn->query($first)){
						//die("This subject doesn't exists ! <br><br> <a class='nav-item' href='../../form/adm/r_sub_l.php'>Go to Remove subject</a> <br><br> <a class='nav-item' href='../../index.php'>Go To Main Page</a>");
					echo "Subject revoke success ! from - ".$l_id.". ";
				}else{
					die("Mysql query failed, Error -> ".mysqli_error($conn));
				}
				echo " <br><br> <a class='nav-item' href='../../form/adm/r_sub_l.php'>Go to Remove subject</a> <br><br> <a class='nav-item' href='../../index.php'>Go To Main Page</a>";
			}else{
				echo "Please don't enter white spaces ! <br><br> You Will Be Redirected To form In 10 Seconds.";
				header("Refresh:10; url='../../form/adm/r_sub_l.php'",303,false);
			}
		}else{
			echo "Please fill all details ! <br><br> You Will Be Redirected To form In 10 Seconds.";
			header("Refresh:10; url='../../form/adm/r_sub_l.php'",303,false);
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
