<!-- new -->
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Submit Daily Student Record PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/css/style.css'>
      <link rel='stylesheet' href='style.css'>
      <link rel='stylesheet' href='style_link.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<!-- follow me template -->
<h1 style="padding: 10px; margin:100px; ">
  <!-- sid,date -->
<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer'){
		$data = $_POST;
	  if(!empty($data)){
		
		$stu_arr = NULL;
		//print_r($data);
		$pre_arr = NULL;
		$work_arr = NULL;
		settype($pre_arr, "array");
		settype($work_arr, "array");
		settype($stu_arr, "array");
		//---------------------------
		$l_id = $_SESSION['id'];
		$dept = $_SESSION['dept'];
		$subj = $_POST['subj'];
		$first = "select * from lecturer inner join subjects on subjects.dept = lecturer.dept where lecturer.l_id = '$l_id' AND subjects.sub_name = '$subj' AND lecturer.dept = '$dept'";
              $query = "select * from student where dept = '$dept'";
              if($res = $conn->query($first)){
                $data9 = $res->fetch_assoc();
                //Array ( [l_id] => L01 [l_name] => QW [dept] => Computer [subj] => CP [subj2] => ACP [subj3] => DBMS [subj4] => ADBMS [subj5] => JAVA [subj6] => AJAVA [exp] => 5 [salary] => 50000 [sub_id] => 1 [sub_name] => JAVA [sem] => 5 )
                
                $query1 = "select * from student where c_sem = '$data9[sem]' AND dept = '$dept'";
                if($res1 = $conn->query($query1)){
                  $res2 =  $conn->query($query1);
                  $data3 = $res2->fetch_assoc();
                  if(!empty($data3)){
                    $stu_arr = NULL;
                    settype($stu_arr, "array");
                    while($data2 = $res1->fetch_assoc()){
                        array_push($stu_arr, $data2['s_id']);        
                    }
                  }else{
                    echo "<center><h2>There are no students of this sem and department !</h2></center>";
                  }
                }
              }else{
                echo mysqli_error($conn);
              }
              $date = Date('Y-m-d');
              foreach ($stu_arr as $value) {
              	$first5 = "select * from dailysturec where s_id = '$value' AND date = '$date'";
              	if($res6 = $conn->query($first5)){
                  if($conn->affected_rows != 0){
                  	die("Record seems already inserted ! <br><br> <a class='nav-item'  href='../../index.php'>Go to main page</a><br><br><a class='nav-item'  href='../../form/lec/dstu_rec_sn.php'>Go to form</a> <div class='made-with-love'>
						 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
						</div>");
                  }
                }else{
                	echo "Default query failed of student = ".$value." - Mysql error -> ".mysqli_error($conn);
                }
              }
              foreach ($stu_arr as $value) {
              	$q = "insert into dailysturec(`s_id`,`present?`,`date`,`home-work`,`uid`) values('$value',DEFAULT,'$date',DEFAULT,DEFAULT)";
              	
              	if($res2 = $conn->query($q)){
                  if($conn->affected_rows == 0){
                  	echo("Default insert failed of student = ".$value.". 0 affected rows");
                  }
                }else{
                	echo "Default insert failed of student = ".$value." - Mysql error -> ".mysqli_error($conn);
                }
              }

		//---------------------------
            $flag = NULL;
            settype($flag, "string");
			foreach($data as $att=>$val){
				if(strpos($att, 'present')){
					$temp = chop($att,"present");
					//print_r($data);
					array_push($pre_arr, $temp);
				}
			}
			foreach($data as $att=>$val){
				if(strpos($att, 'work')){
					$temp = chop($att,"work");
					//print_r($data);
					array_push($work_arr, $temp);
					
				}
			}
			//data ----- Array ( [l_id] => L01 [l_name] => QW [dept] => Computer [subj] => CP [subj2] => ACP [subj3] => DBMS [subj4] => ADBMS [subj5] => JAVA [subj6] => AJAVA [exp] => 5 [salary] => 50000 [sub_id] => 1 [sub_name] => JAVA [sem] => 5 )
			if(!empty($pre_arr)){
				foreach($pre_arr as $pre_arr2){
					$subj2 = ",".$subj;
				   $q3 = "update dailysturec set `present?` = concat(`present?`,'$subj2') where `s_id` = '$pre_arr2' AND `date` = '$date'";  				
				   if($res2 = $conn->query($q3)){
				   	$flag2 = "true";
				   	$flag3 = "true";
	                  if($conn->affected_rows == 0){
	                  	echo("failed to insert absense of student = ".$pre_arr2.". 0 affected rows");
	                  	$flag2 = "0row";
	                  }
	                }else{
	                	echo "failed to insert absense of student = ".$pre_arr2." - Mysql error -> ".mysqli_error($conn)."<br><br><br>";
	                	$flag3 = "qfailed";
	                }
				}
				if($flag2 == "true" && $flag3 == "true"){
					echo "'Absense submit' success !";
				}
			}else{
				echo "All students are present, Submit success !";
			}
			if(!empty($work_arr)){
				foreach($work_arr as $pre_arr3){
					$subj2 = ",".$subj;
				   $q3 = "update dailysturec set `home-work` = concat(`home-work`,'$subj2') where `s_id` = '$pre_arr3' AND `date` = '$date'";  
				   								
				   if($res2 = $conn->query($q3)){
	                  if($conn->affected_rows == 0){
	                  	echo("failed to insert incomplete work of student = ".$pre_arr3.". 0 affected rows");
	                  }else{
	                  	echo "!";
	                  }
	                }else{
	                	echo "failed to insert incomplete work of student = ".$pre_arr3." - Mysql error -> ".mysqli_error($conn);
	                }
				}
				if($flag2 == "true" && $flag3 == "true"){
					echo "<br><br>'Work incomplete' submit success !";
				}
			}else{
				echo "<br><br>All students done work, Submit success !";
			}
			echo " <br><br> <a class='nav-item'  href='../../index.php'>Go to main page</a><br><br><a class='nav-item'  href='../../form/lec/dstu_rec_sn.php'>Go to form</a>";
// 		$sid2 = mysqli_real_escape_string($conn, @$_POST['sid']);
// 		$c_date = date('Y-m-d');

// 		$sid = strtoupper($sid2);
// 		$date = mysqli_real_escape_string($conn, @$_POST['date']);

// 		$dept = $_SESSION['dept'];
// 		if($date > $c_date){
// 			die('Date is greater than today !');
// 		}else{
// 			$dept = $_SESSION['dept'];
// 			//echo $date."--".$c_date;
// 			if(!empty($sid) || !empty($date)){
// 				if(trim($sid) != NULL || trim($date) != NULL){
// 						$first = "select * from dailysturec inner join student on student.s_id = dailysturec.s_id where dailysturec.s_id = '$sid' AND dailysturec.date = '$date' AND student.dept = '$dept'";
// 						if($res1 = $conn->query($first)){
// 							$stu_data = $res1->fetch_assoc();
// 							if($stu_data == NULL){
// 								die("Student Not Found In Your Department !! <br><br> <a class='nav-item'  href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item'  href='../../form/lec/sstu_rec_d.php'>Go to Form</a>");
// 							}
// 						}else{
// 							die("Select Query Failed ! <br><br> <a class='nav-item'  href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item'  href='../../form/lec/sstu_rec_d.php'>Go to Form</a>");
// 						}
// 						$query1 = "delete from `dailysturec` where s_id = '$sid' AND date = '$date'";
// 						if($run1 = $conn->query($query1)){
// 							echo "Delete Success ! - Affected Rows = ".mysqli_affected_rows($conn);
// 						}else{ echo "Delete Query Failed !".mysqli_error($conn); }
// 				}else{
// 					echo "You Have Entered White Spaces !";
// 				}

// 			}else{
// 				echo "Please Fill All Details !";
// 			}
// 			echo "<br><br> You Will Be Redirected To 'Delete Student Daily Record' Page In 15 Seconds";
// 			header('Refresh:15; url= ../../form/lec/dstu_rec_d.php ',303,false);
// 		}
		}else{
			echo("Please fill all details !");
		}
		}else{
			echo "This Page Is Only For Faculty ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.";
			header('Refresh:3; url= ../../index.php ',303,false);
		}
	}else{
		echo "Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.";
		header('Refresh:3; url= ../../index.php ',303,false);
	}
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../../disp/disp/js/index.js'></script>

</body>
</html>