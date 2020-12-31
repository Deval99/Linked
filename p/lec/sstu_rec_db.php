<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Semwise Student Record Delete (bulk) PHP</title>
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
<!-- le_id, s_id, reason, days, from_date, to_date-->
<?php
session_start();
require('../linked_conn.php');
?><!-- cid,sid,lid,date,details,r_flag --><?php
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer' && $_SESSION['hod'] == true){
		
		$sem = mysqli_real_escape_string($conn, @$_POST['sem']);
		$dept = $_SESSION['dept'];
		//sem, total-att

		if(!empty($sem)){
			if(trim($sem) != NULL){
				  if($sem > 6 || $sem < 1){
				  	die('Semester is incorrect !!');
				  }
					$query2 = "select semwisesturec.s_id from semwisesturec inner join student on student.s_id = semwisesturec.s_id where semwisesturec.sem = '$sem' && student.dept = '$dept'";
					if($res1 = $conn->query($query2)){
						$sid = NULL;
						settype($sid, "array");
						while($sids = $res1->fetch_assoc()){
							array_push($sid, $sids['s_id']);
						}
						//echo mysqli_affected_rows($conn);
						if($sid == NULL){
							die("Student records not found in your department !! <br><br> <a class='nav-item' href='../../index.php'>Go to Main Page</a> <br><br> <a class='nav-item' href='../../form/lec/sstu_rec_db.php'>Go to Form</a>");
						}
					}else{
						echo "Mysqli error -> ".mysqli_error($conn);
					}
					$aff = 0;
					$aff3 = 0;
					$aff2 = NULL;
					settype($aff2, "array");
					foreach ($sid as $key => $value){
						$first = "delete from semwisesturec where s_id = '$value' AND sem = '$sem' ";
						if($res2 = $conn->query($first)){
							if(mysqli_affected_rows($conn) == 0){
								array_push($aff2, $value);
								$aff3 += 1;
							}else{
								$aff += 1;
							}
						}else{
							echo "Mysql error -> ".mysqli_error($conn);
						}
					}
					if($aff != 0){
						echo "Semwise record delete succeed of ".$aff." students.";
					}
					if($aff3 != 0){
						echo "Semwise record delete failed of ".$aff3." students. including ";
						foreach($aff2 as $key){
							echo $key.',';
						}
					}
			}else{
				echo "You Have Entered White Spaces !";
			}

			}else{
				echo "Please Fill All Details !";
			}
			echo " <center><br><br><a class='nav-item' href='../../index.php'>Go to home</a>
			<br><br><a class='nav-item' href='../../form/lec/sstu_rec_db.php'>Go to form</a></center>";
			//header('Refresh:15; url= ../../form/lec/sstu_rec_db.php ',303,false);
			
		}else{
			echo "This Page Is Only For Faculty !  <br><br><a class='nav-item' href='../../index.php'>Go to home</a></center>";
		}
	}else{
		echo "Please Login First !  <br><br><a class='nav-item' href='../../index.php'>Go to home</a></center>";
	}
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../../disp/disp/js/index.js'></script>

</body>
</html>