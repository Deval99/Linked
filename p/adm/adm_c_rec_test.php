<?php 
require('../linked_conn.php');
//a_leave,complaints,dailysturec,feedback,midmarks,randomtest,R_COMPlaints,r_leave,semwisesturec
$q = "insert into a_leave(le_id,s_id,reason,from_date,to_date) values(DEFAULT,'S01','reason','2017-06-01','2017-07-02')";
$w = "insert into complaints(cid,sid,lid,date,details,r_flag) values(1,'S01','L01','2017-11-23','Details2','p')";
$e = "insert into dailysturec(`s_id`,`present?`,`date`,`home-work`,`uid`) values('S01','true','2017-09-12','true',DEFAULT)";
$r = "insert into Feedback(f_id,p_id,subject,details,date,r_flag) values(DEFAULT,'P01','qwe','sdfg','2017-11-29',1)";
$t = "insert into midmarks(uid,s_id,subject,marks,dept) values(DEFAULT,'S01','CMT',29,'Computer')";
$y = "insert into randomtest(t_id,s_id,subject,marks,date) values('T01','S01','CNS',56,'2017-09-12')";
$u = "insert into r_complaints(cid, details) values(1,'asdfg')";
$i = "insert into r_leave(uid,sid,reason,days) values(DEFAULT, 'S01','dfgh',2)";
$o = "insert into semwisesturec(`s_id`,`sem`,`total-attend`,`spi`,`performance-status`,`behaviour`,`uid`) values('S01',4,55,9.4,'good','good',DEFAULT)";
if($rq = $conn->query($q)){
 	echo "SUCCESS 1!"."<br>";
}else{
	echo "1 Failed !".mysqli_error($conn)."<br>";
}
if($rw = $conn->query($w)){
 	echo "SUCCESS 2!"."<br>";
}else{
	echo "2 Failed !".mysqli_error($conn)."<br>";
}
if($re = $conn->query($e)){
 	echo "SUCCESS 3!"."<br>";
}else{
	echo "3 Failed !".mysqli_error($conn)."<br>";
}
if($rr = $conn->query($r)){
 	echo "SUCCESS 4!"."<br>";
}else{
	echo "4 Failed !".mysqli_error($conn)."<br>";
}
if($rt = $conn->query($t)){
 	echo "SUCCESS 5!"."<br>";
}else{
	echo "5 Failed !".mysqli_error($conn)."<br>";
}
if($ry = $conn->query($y)){
 	echo "SUCCESS 6!"."<br>";
}else{
	echo "6 Failed !".mysqli_error($conn)."<br>";
}
if($ru = $conn->query($u)){
 	echo "SUCCESS 7!"."<br>";
}else{
	echo "7 Failed !".mysqli_error($conn)."<br>";
}
if($ri = $conn->query($i)){
 	echo "SUCCESS 8!"."<br>";
}else{
	echo "8 Failed !".mysqli_error($conn)."<br>";
}
if($ro = $conn->query($o)){
 	echo "SUCCESS 9!"."<br>";
}else{
	echo "9 Failed !".mysqli_error($conn)."<br>";
}
?>