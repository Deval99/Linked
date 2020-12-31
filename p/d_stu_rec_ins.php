<?php
require('linked_conn.php');
//$sid = $_POST['sid'];
//$present? = $_POST['present?'];
//$homework = $_POST['home-work'];

$present = 'true';
$homework = 'CMT,JAVA';
$sid= 'S01';
$date = date('Y-m-d');

$query = "INSERT INTO `dailysturec`(`s_id`,`present?`,`home-work`,`date`) VALUES ('$sid','$present','homework','$date')";

$query3 = "SELECT * from `student` where `s_id` = '$sid'";
	if($run = $conn->query($query)){ //insert into dsturec
	echo "success !";
		if($present == 'true'){ //present?
			if($run2 = $conn->query($query3)){ //select from stu
				while($data = $run2->fetch_assoc()){
					$_SESSION['total-att'] = $data['total-att'];
				}

				$total_att = $_SESSION['total-att'] + 1;
				$query2 = "UPDATE `student` SET `total-att` = '$total_att' where `s_id` = '$sid' ";
				
				if($run3 = $conn->query($query2)){
					echo "Att++ success";
				}
			}
		}
	}

else { echo "failed";}
?>