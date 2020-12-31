<?php
require('linked_conn.php');
//$sid = $_POST['sid'];
//$reason = $_POST['reason'];
//$days = $_POST['days'];

$hid = 'H02';
$days = "1";
$occ = 'Heavy rain';
$date = '2017-09-04';
	
$query = "insert into holiday (hid, days, occ, date) values ('$hid', '$days', '$occ', '$date')";


if($run = mysql_query($query , $conn)){
echo "success !";
}
else { echo "failed";}
?>