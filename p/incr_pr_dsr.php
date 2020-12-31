<?php
require('linked_conn.php');
//$sid = $_POST['sid'];
$sid= 'S01';

$query1 = "select * from dailysturec where s_id = '$sid'";
if($run = mysql_query($query1 , $conn)){
	while($is_run = mysql_fetch_assoc($run)){
		$pr = $is_run['present?'];
	}
echo "success !".$pr;
}
else { 
	echo "failed".mysql_error($conn).mysql_errno($conn);
}
$pr = $pr + 1;
$query2 = "update dailysturec SET `present?` = $pr WHERE s_id = '$sid'";
if($run2 = mysql_query($query2 , $conn)){
echo "success !";
}
else { echo "failed".mysql_error($conn).mysql_errno($conn);}


?>