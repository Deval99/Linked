<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Surprise test marks delete(bulk) PHP</title>
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
	if($_SESSION['utype'] == 'lecturer'){
		
		$t_id = mysqli_real_escape_string($conn, @$_POST['t_id']);
		$l_id = $_SESSION['id'];
		//sem, total-att

		if(!empty($t_id)){
			if(trim($t_id) != NULL){
					$query2 = "select * from randomtest where t_id = '$t_id' && l_id = '$l_id'";
					if($res1 = $conn->query($query2)){
						$res2 = $res1->fetch_assoc();
						if(empty($res2)){
							die("There are no records of that test ! <br>Does that test belonged to you ?<br>Did you entered Test ID correctly ?<br> Or records may be removed !<br><br> <a class='nav-item' href='../../index.php'>Go to Home</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_db.php'>Go to Form</a>
								<div class='made-with-love'>
								 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
								</div>");
						}
					}else{
						die("Mysqli error -> ".mysqli_error($conn)."<br><br> <a class='nav-item' href='../../index.php'>Go to Home</a> <br><br> <a class='nav-item' href='../../form/lec/r_test_db.php'>Go to Form</a> 

							<div class='made-with-love'>
							 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
							</div>");
					}
					$first = "delete from randomtest where t_id = '$t_id'";
					if($res2 = $conn->query($first)){
						if(mysqli_affected_rows($conn) == 0){
							echo "0 Rows affected !";
						}else{
							echo "Successfully deleted surprise test records. (".mysqli_affected_rows($conn)." Record(s))";
						}
					}else{
						echo "Mysql error -> ".mysqli_error($conn);
					}
			}else{
				echo "You Have Entered White Spaces !";
			}

			}else{
				echo "Please Fill All Details !";
			}
			echo " <center><br><br><a class='nav-item' href='../../index.php'>Go to home</a>
			<br><br><a class='nav-item' href='../../form/lec/r_test_db.php'>Go to form</a></center>";
			//header('Refresh:15; url= ../../form/lec/r_test_db.php ',303,false);
			
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