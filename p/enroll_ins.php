<?php
require('linked_conn.php');
//$sid = $_POST['sid'];
//$enr = $_POST['enr'];

$enr = "Enr1";
$sid = "Sid1";


$query = "insert into enroll(s_id, enr_no) values('sid','enr')";
if($run = mysql_query($query,$conn))
{
	echo "success";
}
else {
	echo "Query Failed";
}

?>