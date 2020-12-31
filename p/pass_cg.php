<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Password change</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../form/temp/css/style.css'>
</head>
<body> 
<?php
session_start();
require('linked_conn.php');
if(!empty($_SESSION['utype'])){
	if($_SESSION['utype'] == 'student' || $_SESSION['utype'] == 'parent' || $_SESSION['utype'] == 'admin' || $_SESSION['utype'] == 'lecturer'){
		echo "<form action='pass_cg2.php' method='POST'>
  		<h1>Password change</h1><br/><h5>*Max length = 32<br>You need to sign in again after password change.</h5>

  		<span class='input'></span>
  		<input type='password' required id='opwd' maxlength='32' name='opwd' placeholder='Old Password' autofocus autocomplete='off' />

  		<span class='input'></span>
  		<input type='password' required id='pwd' maxlength='32' name='pwd' placeholder='New Password' autofocus autocomplete='off' />

  		<span class='input'></span>
  		<input type='password' required id='conf_pwd' maxlength='32' name='conf_pwd' placeholder='Confirm New Password' autofocus autocomplete='off' onchange='val()' />

  		<script type='text/javascript'>
  		function val(){
  			var pwd = document.getElementById('pwd').value;
  			var conf_pwd = document.getElementById('conf_pwd').value;

  			if(pwd != conf_pwd){
  				alert('Confirm password is not same as Password');
  				document.getElementById('pwd').value = '';
  				document.getElementById('conf_pwd').value = '';
  			}
  		}
  		</script>

  		<br><br><br>
  		<button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
		</form>
  		";
		
	}else{   
     echo "<center><h1 style='padding: 100px;'> Something went wrong ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
     header('Refresh:3; url= ../index.php ',303,false);
    }
}else{
  echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../index.php ',303,false);
}
?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='../form/temp/js/index.js'></script>