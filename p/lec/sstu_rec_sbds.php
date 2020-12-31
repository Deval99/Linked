<!-- new -->
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Submit Semwise Student Record PHP</title>
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
  <!-- sid,date 
die("Please fill all fields !<br><br><a href='../../index' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
  -->
<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer' && $_SESSION['hod'] == true){
		$data = $_POST;
		foreach ($data as $key => $value) {
			$data[$key] = mysqli_real_escape_string($conn, $value);
		}
		//print_r($data);
	  if(!empty($data)){
		$stu_arr = NULL;
		$spi_arr = NULL;
		$perf_arr = NULL;
		$sem_arr = NULL;
		$att_arr = NULL;
		//print_r($data);
		//ARRAY ( [S01SPI] => 1 [S01PERF] => 2 [S44SPI] => 3 [S44PERF] => 4 )
		settype($stu_arr, "array");
		settype($spi_arr, "array");
		settype($perf_arr, "array");
		settype($sem_arr, "array");
		settype($att_arr, "array");
		//---------------------------
		$l_id = $_SESSION['id'];
		$dept = $_SESSION['dept'];
		
		foreach($data as $key => $value){
			if(trim($value) == NULL){
				die("Any one field is empty or filled with white spaces ! <br><br><a class='nav-item' href='../../index.php'>Go to home</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sbds.php'>Go to form</a><div class='made-with-love'>
					 <p> &copy; 2017 Linked. All Rights Reserved | Design by Linked Team</a></p>
					</div>");
			}
		}
		//$sem = $_POST['sem'];
		//print_r($data);
		//Array ( [S45spi] => 1 [S45perf] => 1 [S45sem] => 1 [S45attend] => 1 [sem] => 3 )
		$flag = 0;
		$flag_s = 0;
		$flag_f = 0;
		foreach($data as $key => $value){
			if(strpos($key, "spi")){
				$chop = chop($key, 'spi');

				
				$first = "insert into semwisesturec(s_id, spi) values('$chop',$value)";
		        if($res = $conn->query($first)){
		          if(mysqli_affected_rows($conn) == 1){
		        		$flag += 1;
		        	}
		        }else{
		          echo mysqli_error($conn);
		        }
		    }else if(strpos($key, "perf")){
				$chop = chop($key, 'perf');
				$first = "update semwisesturec set `performance-status` = '$value' where s_id = '$chop'";
		        if($res = $conn->query($first)){
		        	if(mysqli_affected_rows($conn) == 1){
		        		$flag += 1;
		        	}
		        }else{
		          echo mysqli_error($conn);
		        }
		    }else if(strpos($key, "sem")){    	
				$chop = chop($key, 'sem');

				$first1 = "select * from semwisesturec where s_id = '$chop' AND sem = '$value'";
		        if($res = $conn->query($first1)){
		        	$res2 = $res->fetch_assoc();
		          if(!empty($res2)){
			          	$sec = "delete from semwisesturec where s_id = '$chop' AND sem = 0";
			          	if($res = $conn->query($sec)){
			        		die("Record Already submitted ! Please don't refresh page !  <br><br><a class='nav-item' href='../../index.php'>Go to home</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sbds.php'>Go to form</a><div class='made-with-love'>
						 <p> &copy; 2017 Linked. All Rights Reserved | Design by Linked Team</a></p>
						</div>");
			        	}else{
			        		die("Something went wrong, Fatal error ! Now this student have record with only performance_status, s_id and spi. We are unable top delete it ! Please delete it IMMIDIATELY  <br><br><a class='nav-item' href='../../index.php'>Go to home</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sbds.php'>Go to form</a><div class='made-with-love'>
						 <p> &copy; 2017 Linked. All Rights Reserved | Design by Linked Team</a></p>
						</div>
						");
			        	}
		          }
		        }else{
		          echo mysqli_error($conn);
		        }

				$first = "update semwisesturec set `sem` = '$value' where s_id = '$chop'";
		        if($res = $conn->query($first)){
		        	if(mysqli_affected_rows($conn) == 1){
		        		$flag += 1;
		        	}
		        }else{
		          echo mysqli_error($conn);
		        }
		    }else if(strpos($key, "attend")){
				$chop = chop($key, 'attend');
				$first = "update semwisesturec set `total-attend` = '$value' where s_id = '$chop'";
		        if($res = $conn->query($first)){
		        	if(mysqli_affected_rows($conn) == 1){
		        		$flag += 1;
		        	}
		        }else{
		          echo mysqli_error($conn);
		        }
		    }
			if($flag == 1){
				$flag_s += 1;
			}else{
				$flag_f += 1;
			}
			$flag = 0;
	    }
	    $flag_s /= 4;
	    $flag_f /= 4;

	    if($flag_s != 0){
	    	echo "Successfully submitted records of ".$flag_s." students.";
	    }
	    if($flag_f != 0){
	    	echo "<br><br> Failed to submit records of ".$flag_f." students ! Or may be it done partially ! Please check table for more info.";
	    }
		
		}else{
			echo("Please fill all details !");
		}
	}else{
		echo "This Page Is Only For HOD !";
	}
}else{
	echo "Please Login First !";
}
echo "<br><br><a class='nav-item' href='../../index.php'>Go to home</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sbds.php'>Go to form</a>";
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../../disp/disp/js/index.js'></script>

</body>
</html>