<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Daily PHP</title>
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
if(isset($_SESSION)){ 
	if($_SESSION['utype'] == 'admin'){
	require('../linked_conn.php');
	$date = Date('Y-m-d');
	$qu2 = "select * from dailysturec where trim(`present?`) = '' AND `date` = '$date'";

		if($res = $conn->query("$qu2")){
			$stu_pre = NULL;

			$res1 = $conn->query("$qu2");
			$data1 = $res1->fetch_assoc();
			if(empty($data1)){
				die("No student found present !<br><br><a class='nav-item' href='../../index.php'>Go to home</a><br><br><div class='made-with-love'>
					 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
					</div>");
			}
			settype($stu_pre, "array");
			while($data = $res->fetch_assoc()){
				array_push($stu_pre, $data['s_id']);
			}
			//print_r($stu_pre);
			foreach($stu_pre as $stu){
				$date = Date('Y-m-d');

				$qu3 = "update student set `total-att` = `total-att` + 1 where `s_id` = '$stu'";
				if($res2 = $conn->query($qu3)){
					echo "Update success. Rows affected -> ".mysqli_affected_rows($conn)."<br><br><a class='nav-item' href='../../index.php'>go to Main page</a>";
				}else{
					echo "Update failed ! <br><br>MySql Error -- ".mysqli_error($conn)."<br><br><a class='nav-item' href='../../index.php'>go to Main page</a>";
				}
			}
		}else{
			echo "Query Failed ! <br><br>MySql Error -- ".mysqli_error($conn)."<br><br>You Will Be Redirected To main page In 10 Seconds.";
			header("Refresh:10; url='../../index.php'",303,false);
		}
	}else{
		echo "Please login as admin ! <br><br>You Will Be Redirected To main page In 10 Seconds.";
		header("Refresh:10; url='../../index.php'",303,false);
	}
}else{
	echo "Please login ! <br><br>You Will Be Redirected To main page In 10 Seconds.";
	header("Refresh:10; url='../../index.php'",303,false);
}
?>
</h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../disp/disp/js/index.js'></script>

</body>
</html>
