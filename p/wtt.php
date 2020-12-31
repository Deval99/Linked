<?php
require("linked_conn.php");

//$sub = $_POST['sub'];
//$dept = $_POST['dept'];
//$start_time = $_POST['start_time'];
//$end_time = $_POST['end_time'];
//$date = $_POST['date'];

$mon = 'cm';
$tue = 'cm';
$wed = 'cm';
$thu = 'cm';
$fri = 'cm';
$sat = 'cm';
$lact_no = 1;
$dept = 'CE';

$query = "insert into weeklytimetable(monday, tuesday, wednesday, thursday, friday, saturday, lecture_no, dept) values('$mon','$tue','$wed','$thu','$fri','$sat','$lact_no','$dept')";
if($run = mysql_query($query,$conn))
{
	echo "success";
}
else {
	echo "Query Failed";
}

?>