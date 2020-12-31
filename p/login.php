<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Login PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<!-- follow me template -->
<h1 style="padding: 10px; margin:100px; ">
<?php
session_start();
//print_r($_COOKIE);
if(!isset($_POST['id'])){
	echo "--post not set--".$_COOKIE['login-attempt']."--";
	//print_r($_SESSION);
    header('Refresh:0.0; url=../index.php',303,false);
}
$id = $_POST['id'];
$pwd = $_POST['pwd'];
require("linked_conn.php");
$id1 = $conn->real_escape_string($id);
$pwd2 = $conn->real_escape_string($pwd);
$pwd1 = md5($pwd2);
$query = <<<SQL
    SELECT *
    FROM `login`
    WHERE `ID` = '$id1' && Pwd = '$pwd1' 
SQL;
if(@$_COOKIE['login-attempt'] < 4){
	if($run = $conn->query($query)) {
		$count = $run->num_rows;
		echo "Count - ".$count."<br><br>";
		
		if($count == 1){
			$data = $run->fetch_assoc();
			echo "Login Success !!";
			$_SESSION['id'] = $id;
			$_SESSION['utype'] = $data['Type'];

			if ($data['Type'] == 'parent') {
				$query = "select * from parents INNER JOIN student ON student.p_id = parents.p_id where parents.p_id = '$id1'";
				if($run = $conn->query($query))
				{
					$run2 = $run->fetch_assoc();
					
					$_SESSION['p_name'] = $run2['p_name'];
					$_SESSION['cont_no'] = $run2['cont_no'];
					$_SESSION['p_sid'] = $run2['s_id'];
					$_SESSION['s_name'] = $run2['s_name'];
					$_SESSION['sem'] = $run2['c_sem'];
					$_SESSION['dept'] = $run2['dept'];
					$_SESSION['fees_p'] = $run2['fees_p'];

				}else{
					echo mysqli_error($conn);
					alert("mysqli_error($conn)");
				}
			}
			
			if ($data['Type'] == 'student') {
				$query = "select * from student inner join parents on parents.p_id = student.p_id where s_id = '$id1'";
				if($run = $conn->query($query))
				{
					$run2 = $run->fetch_assoc();
					//print_r($run2);
					$_SESSION['s_name'] = $run2['s_name'];
					$_SESSION['sem'] = $run2['c_sem'];
					$_SESSION['dept'] = $run2['dept'];
					$_SESSION['s_pid'] = $run2['p_id'];
					$_SESSION['fees_p'] = $run2['fees_p'];

					$_SESSION['p_name'] = $run2['p_name'];
					$_SESSION['cont_no'] = $run2['cont_no'];
					$_SESSION['s_pid'] = $run2['p_id'];
				}
			}
			if ($data['Type'] == 'lecturer') {
				$query = "select * from lecturer where l_id = '$id1'";
				if($run = $conn->query($query))
				{
					$run2 = $run->fetch_assoc();
					
					$_SESSION['l_name'] = $run2['l_name'];
					$_SESSION['subj'] = $run2['subj'];
					$_SESSION['exp'] = $run2['exp'];
					$_SESSION['dept'] = $run2['dept'];
					$_SESSION['salary'] = $run2['salary'];
				}
			}
			$zero = 0;
			setcookie('login-attempt',$zero,time()+60*10,"/");
			alert("Login Successful !");
			header('Refresh:0.0; url=../index.php',303,false);
		} else {
			echo "Login Failed ".$count;
			$Cky = $_COOKIE['login-attempt'] + 1;
			setcookie('login-attempt',$Cky,time()+60*10,"/");
			alert2('You Have Entered Wrong ID Or Password. Login Attempts = ',$Cky); 
		}
		}  else {
			echo "Query Failed".$id."\n".$pwd;
			echo $conn->error; 
			header( "Location: ../index.php");
		}
	} else {	
			setcookie('login-attempt','5',time()+60*10,"/");
			alert('You Have Incorrectly Entered Your ID And Password 5 Times Now You Can Not Login In Next 10 Minutes ! (FROM NOW) ');
	}
function alert($msg) {
    echo "<script type='text/javascript'>alert('".$msg."');</script>";
    header('Refresh:0.0; url=../index.php',303,false);
} 
function alert2($msg,$var) {
    echo "<script type='text/javascript'>alert('".$msg.$var."');</script>";
    header('Refresh:0.0; url=../index.php',303,false);
} 
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../disp/disp/js/index.js'></script>

</body>
</html>