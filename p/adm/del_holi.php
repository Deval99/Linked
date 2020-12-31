<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Delete Holiday PHP</title>
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
		
		$hid = mysqli_real_escape_string($conn, $_POST['hid']);
		$flag = false;
		$date = Date('Y-m-d');
		$first = "select * from holiday where `date` > '$date'";
		if($res1 = $conn->query($first)){
		  if($res1 != NULL){ //hid,days,occ,date
		    while($data = $res1->fetch_assoc()){
		    	if($data['hid'] == $hid){
		    		$flag = true;
		    	}
		    }
		    if($flag == true){
		    	$query = "delete from holiday where `hid` = '$hid'";
		    	if($res2 = $conn->query($query)){
		    		echo "Delete Success ! -- Affected Rows -> ".mysqli_affected_rows($conn);
		    	}else{
		    		echo "Delete Failed ! -- MySql Error -> ".mysqli_error($conn);
		    	}
		    }else{
		    	echo "Please Enter Valid ID ! <br><br> <a href='../../form/adm/del_holi.php'>Return To Form </a> <br><br> <a href='../../index.php>Go To Home Page</a>'";
		    }
		  }else{
		    echo "No Events To Delete ! <br><br><a href='../../index.php'> Go To Main Page </a>";
		  }
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
