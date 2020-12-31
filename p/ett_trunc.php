<?php
require("linked_conn.php");

$query = "delete from examtimetable where dept='CE'";
if($run = mysql_query($query,$conn))
{
	echo "success";
}
else {
	echo "Query Failed";
}

?>