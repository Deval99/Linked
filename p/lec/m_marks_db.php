<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Mid marks Delete (bulk) PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/css/style.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style_link.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<!-- follow me template -->
<h1 style="padding: 10px; margin:100px; ">
<!-- le_id, s_id, reason, days, from_date, to_date-->
<?php
session_start();
require('../linked_conn.php');
//cid,sid,lid,date,details,r_flag 
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer' && $_SESSION['hod'] == true){
		
		$sub_name = mysqli_real_escape_string($conn, @$_POST['sub_name']);
		if(empty($sub_name)){
			die("Please fill all details ! <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/m_marks_db.php'>Go to form</a><div class='made-with-love'>
				 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
				</div>");
		}
		$dept = $_SESSION['dept'];
		//sem, total-att
		$sub_name = @$_POST['sub_name'];
        $q3 = "select * from subjects where sub_name = '$sub_name'";
        if($res6 = $conn->query($q3)){
            $res7 = $res6->fetch_assoc();
            if(!empty($res7)){
                $sem = $res7['sem'];
            }
        }else{
            echo "Mysqli error -> ".mysqli_error($conn);
        }
		$first = "delete from midmarks where sem = $sem AND dept='$dept' AND subject = '$sub_name'";
	    if($res = $conn->query($first)){
	        $data9 = mysqli_affected_rows($conn);
	        if($data9 != 0){
	            echo("Delete successful, deleted records of ".$data9." students !");
	        }else{
	        	echo("Delete failed, deleted records of 0 students ! ");
	        }
	    }else{
	          echo mysqli_error($conn);
	    }
	    echo "<br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/m_marks_db.php'>Go to form</a>";
	}else{
		echo "This Page Is Only For Faculty !  <br><br><a class='nav-item' href='../../index.php'>Go to home</a></center>";
	}
}else{
	echo "Please Login First !  <br><br><a class='nav-item' href='../../index.php'>Go to home</a></center>";
}
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../../disp/disp/js/index.js'></script>

</body>
</html>