<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Login PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<h1 style="padding: 10px; margin:100px; ">
<?php
//$id = $_POST['sid'];
//$name = $_POST['sname'];
//$pid = $_POST['pid'];
//$sem = $_POST['sem'];
//$dept = $_POST['dept'];
//$fees = $_POST['fees'];

//$pname = $_POST['pname'];
//$cont = $_POST['cont'];

//$spwd = md5($_POST['spwd']);
//$ppwd = md5($_POST['ppwd']);

//s_id,s_name,p_id,sem,dept,fees_p
$sid = 'S03';
$sname = 'mj';
$sem = '5';
$dept = 'computer';
$fees = 'false';
$pid = 'P03';

$pname = 'ABCde';
$cont = 1234567890;

$spwd = md5('password');
$ppwd = md5('password');


require("linked_conn.php");
$query = "insert into student(s_id,s_name,p_id,sem,dept,fees_p) values('$sid','$sname','$pid','$sem','$dept','$fees')";
if($run = $conn->query($query))
{
	echo "success_stu";
}
else {
	echo "Query Failed_stu";
}
//p_id,p_name,s_id,cont_no

$query = "insert into parents(p_id,p_name,s_id,cont_no) values('$pid','$pname','$sid','$cont')";
if($run = $conn->query($query ))
{
	echo "success_prnt";
}
else {
	echo "Query Failed_prnt";
}
//Id,Pwd,Type

$query = "insert into login(Id,Pwd,Type) values('$pid','$ppwd','parent')";
if($run = $conn->query($query ))
{
	echo "<br>"."login_ins_success_prnt"."<br>";
}
else {
	echo "<br>"."login_ins_fail_prnt".$conn->error."<br>";
}
$query = "insert into login(Id,Pwd,Type) values('$sid','$spwd','student')";
if($run = $conn->query($query ))
{
	echo "<br>"."login_ins_success_stu"."<br>";
}
else {
	echo "<br>"."login_ins_fail_stu".$conn->error."<br>";
}
?>
</h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../disp/disp/js/index.js'></script>

</body>
</html>
