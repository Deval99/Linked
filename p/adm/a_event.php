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
session_start();
require("../linked_conn.php");
$e_name = mysqli_real_escape_string($conn, $_POST['e_name']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$details = mysqli_real_escape_string($conn, $_POST['details']);


/*delete from enroll,login,parents,student*/ 
$check = "select * from event where date = '$date'";
	if($res19 = $conn->query($check)){
		if($data = $res19->fetch_assoc()){
			die("You Have Already Added Event On This Date !");
		}
	}
$add = "insert into event(e_id,e_name,date,detail) values(DEFAULT,'$e_name','$date','$details')";
if($res1 = $conn->query($add)){
	echo "Add Event Success ! -- Affected Rows -> ".mysqli_affected_rows($conn)."<br> You Will Be Redirected To Main Page In 10 Seconds";
	header("Refresh:10; url='../../index.php'",303,false);
}else{
	echo "Add Event Failed ! -- MySql Error -> ".mysqli_error($conn);
}
/*
$qu_p_id = "select * from student where s_id = '$s_id'";
$c_date = date('Y-m-d');
if($run = $conn->query($qu_p_id)){
	$data = $run->fetch_assoc();
	if($data['p_id'] == NULL){
		//die("Parent And Student ID Not Found, Please Enter A Valid One !");
	}
	else{
		$p_id = $data['p_id'];
	}
}

$reason = mysqli_real_escape_string($conn, $_POST['reason']);
$enr_qu1 = "select * from enroll where s_id = '$s_id' ";
$enr_qu = "delete from enroll where s_id = '$s_id' ";
$stu_login_qu = "delete from login where ID = '$s_id'";
$prt_login_qu = "delete from login where ID = '$p_id'";
$prt_qu = "delete from parents where p_id = '$p_id'";
$stu_qu = "delete from student where s_id = '$s_id'";
$c_ins_qu = "insert into adm_c (s_id, p_id, cancel_date, reason) values('$s_id','$p_id','$c_date','$reason')";
$_SESSION['s_id'] = $s_id;
if($res1 = $conn->query($enr_qu1)){
	if($res1->num_rows != 0){
		if($res21 = $conn->query($enr_qu)){
			echo "Enrollment Delete Success!  <br>";
			if($res2 = $conn->query($stu_login_qu)){
				echo "Student Login Delete Success!  <br>";
			}else{
				echo "Student Login Delete Failed -- MySqli Error =".mysqli_error($conn)."<br>";
			}
			if($res3 = $conn->query($prt_login_qu)){
				echo "Parent Login Delete Success!  <br>";
			}else{
				echo "Parent Login Delete Failed -- MySqli Error =".mysqli_error($conn)."<br>";
			}
			if($res4 = $conn->query($prt_qu)){
				echo "Parent Delete Success!   <br>";
			}else{
				echo "Parent Delete Failed! -- MySqli Error =".mysqli_error($conn)."<br>";
			}
			if($res5 = $conn->query($stu_qu)){
				echo "Student Delete Success!   <br>";
			}else{
				echo "Student Delete Failed! -- MySqli Error =".mysqli_error($conn)."<br>";
			}
			if($res16 = $conn->query($c_ins_qu)){
				echo "Admission Cancel Record Insert Success! !<br>";
			}else{
				echo "Admission Cancel Record Insert Failed ! -- MySqli Error =".mysqli_error($conn)."<br>";
			}
		}else{
			echo "Enrollment Delete Query Failed ! -- MySqli Error =".mysqli_error($conn)."<br>";
		}
	}else{
		echo "Enrollment Does't Exist ! <br> May Be You Entered A Wrong Student ID <br><br><br>";
	}
}
*/
?>

<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='../disp/disp/js/index.js'></script>
</body>
</html>
