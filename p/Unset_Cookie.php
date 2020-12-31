<?php 

session_start();
if (isset($_SESSION['login-attempt'])){
	echo "session was on";
unset($_SESSION['login-attempt']);
session_destroy();
}
if ($_COOKIE['login-attempt'] != 0){
		echo "cookie was on";
		setcookie('login-attempt',null,-1,"/");
}
?>