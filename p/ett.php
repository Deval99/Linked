<?php
require("linked_conn.php");

//$sub = $_POST['sub'];
//$dept = $_POST['dept'];
//$start_time = $_POST['start_time'];
//$end_time = $_POST['end_time'];
//$date = $_POST['date'];

$sub = 'cm';
$dept = 'CE';
$start_time = '10:00:00';
$end_time = '12:00:00';
$date = date('Y-m-d');

$query = "insert into examtimetable(subject, dept, start_time, end_time, date) values('$sub','$dept','$start_time', '$end_time', '$date')";
if($run = mysql_query($query,$conn))
{
	echo "success";
}
else {
	echo "Query Failed";
}

?>