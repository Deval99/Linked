<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Mid-Sem Marks Submit</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/css/style.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style_link.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<!-- follow me template -->
<h1 style="padding: 10px; margin:100px; ">
<!-- s_id*,subject*,marks*,dept,sem*,date* -->
<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer' && $_SESSION['hod'] = true){
		
		$sid = mysqli_real_escape_string($conn, @$_POST['s_id']);
		$subject2 = mysqli_real_escape_string($conn, @$_POST['subject']);
		$marks = mysqli_real_escape_string($conn, @$_POST['marks']);
		$my_dept = $_SESSION['dept'];
		$sem = mysqli_real_escape_string($conn, @$_POST['sem']);
		$date = mysqli_real_escape_string($conn, @$_POST['date']);
		$p_date = Date('Y-m-d');

		$subject = strtoupper($subject2);
		$mint = (int)$marks;
		if(!empty($sid) && !empty($subject) && !empty($marks) && !empty($sem) && !empty($date)){
			if(trim($sid) != NULL && trim($subject) != NULL && trim($marks) != NULL && trim($sem) != NULL && trim($date) != NULL){
				if($sem > 6 || $sem < 1){
					die("Please enter correct sem !<br><br><a class='nav-item' href='../../index.php'>Go to home</a></h1><div class='footer-w3l' style='width: 100%;'>
				          <center><p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p></center>
				        </div>");
				}
				if($mint > 30 || $mint < 0){
					echo "Please enter marks between 0 and 30 !";
				}else{
					
				    $query = "select * from subjects where sub_name = '$subject' AND dept = '$my_dept'";
				    if($res1 = $conn->query($query)){
				       	$res2 = $res1->fetch_assoc();
				       	if(empty($res2)){
				       		die("No subject found ! Please enter valid subject !<br><br><a class='nav-item' href='../../index.php'>Go to home</a></h1><div class='footer-w3l' style='width: 100%;'>
						          <center><p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p></center>
						        </div>");
				       	}
				       	if($res2['sem'] != $sem){
				       		die("Invalid subject or sem !<br><br><a class='nav-item' href='../../index.php'>Go to home</a></h1><div class='footer-w3l' style='width: 100%;'>
						          <center><p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p></center>
						        </div>");	
				       	}
				    }else{
				        die("Mysql error-> ".mysqli_error($conn)."<br><br><a class='nav-item' href='../../index.php'>Go to home</a></h1><div class='footer-w3l' style='width: 100%;'>
				        	  <center><p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p></center>
				        	</div>");
				    }
					$first = "select * from student where s_id = '$sid' AND dept = '$my_dept'";
					if($res1 = $conn->query($first)){
						$stu_data = $res1->fetch_assoc();
						if($stu_data == NULL){
							die("Student Not Found In Your Department !! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/m_marks_s.php'>Go to Form</a></h1><div class='footer-w3l' style='width: 100%;'>
				        	  <center><p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p></center>
				        	</div>");
						}else{
							$dept = $stu_data['dept'];
							$c_sem = (int)$stu_data['c_sem'];
							if($c_sem < $sem){
								die("Student is studying in sem ".$c_sem." and you are trying to insert marks of sem ".$sem." ! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/m_marks_s.php'>Go to Form</a><br><br></h1><div class='footer-w3l' style='width: 100%;'>
				        	  <center><p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p></center>
				        	</div>");
							}
						}
					}

					$query2 = "select * from midmarks where s_id = '$sid' AND subject = '$subject' AND dept = '$dept' AND sem = '$sem'";
					if($res1 = $conn->query($query2)){
						$stu_data = $res1->fetch_assoc();
						if($stu_data != NULL){
							die("Record Already Exists !! <br><br> <a href='../../index.php'>Go to Main Page</a> <br><br> <a href='../../form/lec/m_marks_s.php'>Go to Form</a></h1><div class='made-with-love'>
								 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
								</div>");
						}
					}
					$date = date('Y-m-d');
					$query1 = "insert into `midmarks`(`s_id`,`subject`,`marks`,`dept`,`sem`,`submit_date`) values('$sid','$subject','$marks','$dept','$sem','$date')";
					if($run1 = $conn->query($query1)){
						echo "Insert Success ! - Affected Rows = ".mysqli_affected_rows($conn);
					}else{ echo "Insert Query Failed !".mysqli_error($conn); }
				}
			}else{
				echo "You Have Entered White Spaces !";
			}

			}else{
				echo "Please Fill All Details !";
			}
			echo " <br><br> <a class='nav-item' href='../../index.php'>Go to home</a><br><br><a class='nav-item' href='../../form/lec/m_marks_s.php'></a>";
		}else{
			echo "This Page Is Only For HOD ! <br><br> <a class='nav-item' href='../../index.php'>Go to home</a><br><br><a class='nav-item' href='../../form/lec/m_marks_s.php'></a>";
		}
	}else{
		echo "Please Login First !  <br><br> <a class='nav-item' href='../../index.php'>Go to home</a><br><br><a class='nav-item' href='../../form/lec/m_marks_s.php'></a>";
	}
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../../disp/disp/js/index.js'></script>

</body>
</html>