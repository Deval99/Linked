<?php
//$eid = $_POST['event_id'];
//$details = $_POST['event_details'];

$details = "qwerty";
$eid = "eid1";
$date = date('Y-m-d');
require("linked_conn.php");
$query = "insert into event(e_id, date, detail) values('eid','$date','$details')";
if($run = mysql_query($query,$conn))
{
	echo "success";
}
else {
	echo "Query Failed";
}

?>