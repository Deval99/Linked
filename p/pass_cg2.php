<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Password change PHP</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../form/temp/css/style.css'>
</head>
<body> <center><h1 style="padding-top:10%;">

<?php
session_start();
require('linked_conn.php');
$id = $_SESSION['id'];
$new_pass1 = mysqli_real_escape_string($conn, @$_POST['pwd']);
$new_pass21 = mysqli_real_escape_string($conn, @$_POST['conf_pwd']);
$old_pass2 = mysqli_real_escape_string($conn, @$_POST['opwd']);
$old_pass = trim($old_pass2);
$md5_old_pass = md5($old_pass);
$new_pass = trim($new_pass1);
$new_pass2 = trim($new_pass21);
if(!empty($new_pass) && !empty($old_pass)){
	if($old_pass == $new_pass1){
		echo("<script type='text/javascript'>alert('Old password and new password are same !');</script>");
		header("Refresh:0; url='../index.php'",303,false);
		die();
	}
	if($new_pass == $new_pass2){
		$query = "select * from login where id = '$id'";
		if($res1 = $conn->query($query)){	
			$res2 = $res1->fetch_assoc();
			if($res2['Pwd'] != $md5_old_pass){
				echo "<script type='text/javascript'>alert('Wrong Old_Password Please Login again !');</script>";
				header("refresh:0; url='logout.php'",303,false);
				die(" ");
			}
		}
		if(!(strlen($new_pass) > 32)){
			$md5new = md5($new_pass);
			$query = "update login set pwd = '$md5new' where id = '$id'";
			if($run = $conn->query($query)){
				echo "<script type='text/javascript'>alert('Password change success ! - Rows Affected -> ".mysqli_affected_rows($conn)."  Please login again with new password');</script>";
				header("Refresh:0; url = 'logout.php'",303,false);
			}else{
				echo "<script type='text/javascript'>alert('Password change failed ! - Mysql error -> ".mysqli_error($conn)."  You will be redirected to main page in 10 seconds')</script>";
				header("Refresh:0; url = '../index.php'",303,false);
			}
		}else{
			echo "<script type='text/javascript'>alert('Max length is 32 !')</script>";
			header("Refresh:0; url = 'pass_cg.php'",303,false);
		}
	}else{
		echo "<script type='text/javascript'>alert('Password and Confirm_password aren't matching !')</script>";
		header("Refresh:0; url = 'pass_cg.php'",303,false);
	}
}else{
	echo "<script type='text/javascript'>alert('Passwords are empty or they contains white spaces !')</script>";
	header("Refresh:0; url = 'pass_cg.php'",303,false);
}
?>
</h1></center>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='../form/temp/js/index.js'></script>