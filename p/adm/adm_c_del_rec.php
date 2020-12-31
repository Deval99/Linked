<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Login PHP</title>
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
require('../linked_conn.php');
//a_leave,complaints,dailysturec,feedback,midmarks,randomtest,R_COMPlaints,r_leave,semwisesturec
$s_id2 = $_POST['s_id'];
session_start();
$firstq = "select * from adm_c where s_id = '$s_id2'";
if($res18 = $conn->query($firstq)){
	$data3 = $res18->fetch_assoc();
	if($data3 == NULL){
		die("Either Student Doesn't Exist Or Student's Admission Is Not Yet Cancelled !");
	}else{
		$p_id = $data['p_id'];

		$a_leave = "delete from a_leave where s_id = '$s_id2'";
		$dailysturec = "delete from dailysturec where s_id = '$s_id2'";
		$feedback = "delete from Feedback where p_id = '$p_id'";
		$midmarks = "delete from midmarks where s_id= '$s_id2'";
		$randomtest = "delete from randomtest where s_id = '$s_id2'";
		$r_comp_sel = "select * from complaints where sid = '$s_id2'";

		$complaints = "delete from complaints where sid = '$s_id2'";
		$r_leave = "delete from r_leave where sid = '$s_id2'";
		$semwisesturec = "delete from semwisesturec where s_id = '$s_id2'";

		if($res6 = $conn->query($a_leave)){
				echo "Ask Leave Records Delete Success ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
				if($res13 = $conn->query($r_leave)){
					echo "'Reply To Leave_Request' Records Delete Success ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
				}else{
					echo "Reply To Leave_Request Delete Failed -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";
				}
		}else{
			echo "Ask Leave Record Delete Failed -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";
		}
		if($res7 = $conn->query($dailysturec)){
			echo "Daily Student Records Delete Success ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
		}else{
			echo "Daily Student Record Delete Failed -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";
		}
		if($res8 = $conn->query($feedback)){
			echo "Feedback Records Delete Success ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
		}else{
			echo "Feedback Records Delete Failed -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";
		}
		if($res9 = $conn->query($midmarks)){
			echo "Mid Marks Records Delete Success ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
		}else{
			echo "Mid Marks Records Delete Failed -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";
		}
		if($res10 = $conn->query($randomtest)){
			echo "Surprise Test Records Delete Success ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
		}else{
			echo "Surprise Test Records Delete Failed -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";
		}
		if($res11 = $conn->query($r_comp_sel)){
			$data2 = $res11->fetch_assoc();
			$c_id = $data2['cid'];
			if($c_id != NULL){
				$r_complaints = "delete from r_complaints where cid = '$c_id'";
				if($res12 = $conn->query($r_complaints)){
					echo "Reply To Complaints Delete Success ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
				}else{
					echo "Reply To Complaints Delete Failed ! -- <br> Mysql Error ->".mysqli_error($conn)."<br>";
				}
				if($res17 = $conn->query($complaints)){
					echo "Complaints Delete Success ! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
				}else{
					echo "Complaints Delete Failed ! -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";		
				}
			}else{
				echo "'Complaints' And 'Reply Complaints' Table Doesn't Contain Any Data Of This Student ! -- Rows Affected -> 0 <br><br>";
			}
		}else{
			echo "Complaints Select Query Failed ! -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";
		}
		if($res14 = $conn->query($semwisesturec)){
			echo "SemWise Student Record Delete Success! -- Rows Affected -> ".mysqli_affected_rows($conn)."<br><br>";
		}else{
			echo "SemWise Student Record Delete Failed ! -- <br> Mysql Error -> ".mysqli_error($conn)."<br>";
		}
	}
}else{
	echo "Admission_Cancel Table Query Failed ! <br> -- Mysql Error -> ".mysqli_error($conn);
}
?>
<a href="../../index.php">go to Home Page</a><br><br>
<a href="../../form/adm/adm_c_del_rec.php">go to Record Delete Form</a>
</h1><div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../disp/disp/js/index.js'></script>

</body>
</html>
