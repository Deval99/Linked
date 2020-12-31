<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Admission PHP</title>
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
	$s_id = mysqli_real_escape_string($conn, $_POST['s_id']);
	$s_name = mysqli_real_escape_string($conn, $_POST['s_name']);
	$total_att = 0;
	$sem = mysqli_real_escape_string($conn, $_POST['sem']);
	$dept = mysqli_real_escape_string($conn, $_POST['dept']);
	$fees_p = mysqli_real_escape_string($conn, $_POST['fees_p']);
	$enr_no = mysqli_real_escape_string($conn, $_POST['enr_no']);
	$pwd_stu = mysqli_real_escape_string($conn, $_POST['pwd_stu']);
	$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
	$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
	$cont_no = mysqli_real_escape_string($conn, $_POST['cont_no']);
	$pwd_prt = mysqli_real_escape_string($conn, $_POST['pwd_prt']);
	$conf_prt = mysqli_real_escape_string($conn, $_POST['conf_pwd_prt']);
	$conf_stu = mysqli_real_escape_string($conn, $_POST['conf_pwd_stu']);

	$pwd_prt = md5($pwd_prt);
	$pwd_stu = md5($pwd_stu);
if(!empty($s_id) && !empty($s_name) && !empty($sem) && !empty($dept) && !empty($fees_p) && !empty($enr_no) && !empty($pwd_stu) && !empty($p_id) && !empty($p_name) && !empty($cont_no) && !empty($pwd_prt) && !empty($conf_prt) && !empty($conf_stu)){
	//login,student,parents
	if(md5($conf_prt) == $pwd_prt && md5($conf_stu) == $pwd_stu){
		if($cont_no > 9999999999 || $cont_no <= 999999999){
			die("Contact number doesn't seem right !");
		}
		$stu_log_ins_query = "insert into login (ID, Pwd, Type) values('$s_id','$pwd_stu','student')";
		$prt_log_ins_query = "insert into login (ID, Pwd, Type) values('$p_id','$pwd_prt','parent')";

		$stu_ins_query = "insert into student (`s_id`,`s_name`,`total-att`,`p_id`,`c_sem`,`dept`,`fees_p`) values('$s_id','$s_name','$total_att','$p_id','$sem','$dept','$fees_p')";

		$prt_ins_query = "insert into parents (p_id,p_name,cont_no) values('$p_id','$p_name','$cont_no')";

		$enr_ins_query = "insert into enroll (s_id,enr_no) values('$s_id','$enr_no')";

		if($mq_enr_ins_query = $conn->query("$enr_ins_query")){
			echo "Enrollment Insert Success<br>";
			if($mq_stu_log_ins_query = $conn->query("$stu_log_ins_query")){
			echo "Student Login Insert Success<br>";
			}else{
				echo "Student Login Insert Failed".mysqli_error($conn)."<br><br>";
			}
			if($mq_prt_log_ins_query = $conn->query("$prt_log_ins_query")){
				echo "Parent Login Insert Success<br>";
			}else{
				echo "Parent Login Insert Failed".mysqli_error($conn)."<br><br>";
			}
			if($mq_stu_ins_query = $conn->query("$stu_ins_query")){
				echo "Student Insert Success<br>";
			}else{
				echo "Student Insert Failed".mysqli_error($conn)."<br><br>";
			}
			if($mq_prt_ins_query = $conn->query("$prt_ins_query")){
				echo "Parent Insert Success<br><br>";
			}else{
				echo "Parent Insert Failed".mysqli_error($conn)."<br><br>";
			}
		}else{
			echo "Enrollment Insert Failed ! May Be You Have Entered An ID That Is Already Exists<br><br>MySql Error -- ".mysqli_error($conn)."<br><br>You Will Be Redirected To Admission Form In 10 Seconds.";
			header("Refresh:10; url='../../form/adm/adm.php'",303,false);
		}
	}else{
		//echo $conf_prt."<br><br>".$pwd_prt."<br><br>".$conf_stu."<br><br>".$pwd_stu."<br><br>";
		echo "Passwords Are Not Matching, Please Try Again ! <br> You Will Be Redirected To Admission Form In 10 Seconds.";
		header("refresh:10; url='../../form/adm/adm.php'",303,false);
	}
}else{
	echo "Please Enter All Details ! <br> You Will Be Redirected To Admission Form In 10 Seconds.";
	header("refresh:10; url='../../form/adm/adm.php'",303,false);
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
