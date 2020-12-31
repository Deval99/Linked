<?php
		/*$dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'password';*/
        $conn = new mysqli("localhost","phpmyadmin","pass","spms",0,"/var/run/mysqld/mysqld.sock");
       // $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    	if($conn->connect_errno > 0){
            die('Could not connect to DB: ' . mysqli_error());
        }//else{
        //echo 'Connected successfully';}
        //mysqli_close($conn);
?>
