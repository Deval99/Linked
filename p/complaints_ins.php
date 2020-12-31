<?php
require('linked_conn.php');
//$cid = $_POST['cid'];
//$sid = $_POST['sid'];
//$lid = $_POST['lid'];
//$details = $_POST['details'];

$cid = 'C05';
$sid = 'S01';
$lid = 'L01';
$details = 'Poor Performance';

$date = date('Y-m-d');

$query = "insert into complaints (cid, sid, lid, date, details) values('$cid','$sid','$lid','$date','$details')";

if($run = mysql_query($query , $conn)){
echo "success !";
}
else { echo "failed";}

?>