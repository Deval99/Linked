<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Add Weekly Time Table PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body> 
	<!--index,sem,monday...,dept,uid-->
	<h1 style="padding: 10px; margin:100px; ">
<?php 
session_start();
require("../linked_conn.php");
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'admin'){
		$dept =      mysqli_real_escape_string($conn, $_POST['dept']);
		$sem =       mysqli_real_escape_string($conn, $_POST['sem']);
		$index =     mysqli_real_escape_string($conn, $_POST['index']);
		$monday =    mysqli_real_escape_string($conn, $_POST['monday']);
		$tuesday =   mysqli_real_escape_string($conn, $_POST['tuesday']);
		$wednesday = mysqli_real_escape_string($conn, $_POST['wednesday']);
		$thursday =  mysqli_real_escape_string($conn, $_POST['thursday']);
		$friday =    mysqli_real_escape_string($conn, $_POST['friday']);
		$saturday =  mysqli_real_escape_string($conn, $_POST['saturday']);

		if(!empty($dept) && !empty($sem) && !empty($index) && !empty($monday) && !empty($tuesday) && !empty($wednesday) && !empty($thursday) && !empty($friday) && !empty($saturday)){
			$first = "select* from weeklytimetable where `index` = $index AND `sem` = $sem AND `dept` = '$dept'";
			if($res20 = $conn->query($first)){
				while($data = $res20->fetch_assoc()){
					if($data != NULL){
						die("Semester/Department/Index Must Be Wrong, This Combination Is Already Exists ! <br><br> <a href='../../form/adm/wtti.php'>Go To Add_Weekly_TimeTable </a> <br><br> <a href='../../index.php'>Go To Main Page</a>");
					}
				}
			}else{
				echo "mysql->".mysqli_error($conn);
			}

			$query = "insert into weeklytimetable (`index`,`sem`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`,`saturday`,`dept`,`uid`) values($index,$sem,'$monday','$tuesday','$wednesday','$thursday','$friday','$saturday','$dept',DEFAULT)";
			if($res19 = $conn->query($query)){
				echo "index-".$index."| sem-".$sem."| dept-".$dept."| Insert Successful ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br>";
			}else{
				echo "index-".$index."| sem-".$sem."| dept-".$dept."| Insert Failed ! - Mysql Error -> ".mysqli_error($conn);
			}

			echo "<br><br> <a href='../../form/adm/wtti.php'>Go To Add_Weekly_TimeTable </a> <br><br> <a href='../../index.php'>Go To Main Page</a>";
		}else{
			echo "Please Fill All Fields ! <br><br> You Will Be Redirected To Add_Weekly_Time_Table Form In 10 Seconds.";
			header("Refresh:10; url='../../form/adm/wtti.php'");
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