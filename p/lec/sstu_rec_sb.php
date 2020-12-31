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
die("Please fill all fields !<br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
  -->
<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer'){
		$data = $_POST; //mysqli_real_escape_string($conn, $_POST);
		foreach ($data as $key => $value) {
			$data[$key] = mysqli_real_escape_string($conn, $value);
		}
		//print_r($data);
	  if(!empty($data)){
		
		$stu_arr = NULL;
		$spi_arr = NULL;
		$perf_arr = NULL;
		//print_r($data);
		//ARRAY ( [S01SPI] => 1 [S01PERF] => 2 [S44SPI] => 3 [S44PERF] => 4 )
		settype($stu_arr, "array");
		settype($spi_arr, "array");
		settype($perf_arr, "array");
		//---------------------------
		$l_id = $_SESSION['id'];
		$dept = $_SESSION['dept'];
		foreach ($data as $key => $value) {
			if($key == "sem"){
				$sem = $value;
			}
		}
		if(count($data) == 1){
			die("Please fill all fields !<br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
		}
		//echo $sem;
		//$sem = $_POST['sem'];
		$first = "select * from student where c_sem = '$sem'";
              if($res = $conn->query($first)){
                $data9 = $res->fetch_assoc();
                //Array ( [l_id] => L01 [l_name] => QW [dept] => Computer [subj] => CP [subj2] => ACP [subj3] => DBMS [subj4] => ADBMS [subj5] => JAVA [subj6] => AJAVA [exp] => 5 [salary] => 50000 [sub_id] => 1 [sub_name] => JAVA [sem] => 5 )
                if($data9 == NULL){
                	die("There are no students in this sem or department ! <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
                }
              }else{
                echo mysqli_error($conn);
              }
		//---------------------------
            $flag = NULL;
            settype($flag, "string");
            $flag_spi = 0;
            $flag_perf = 0;
			foreach($data as $att=>$val){
				if(strpos($att, 'spi')){

					$temp = chop($att,"spi");
					////echo $temp;
					//print_r($data);
					//array_push($spi_arr, $temp);
					////$arr = array($spi_arr, $perf_arr);
					//print_r($arr);
					//Array ( [0] => Array ( [0] => S01 [1] => S44 ) [1] => Array ( [0] => S01 [1] => S44 ) ) 
					//0 = spi_arr, 1 = perf_arr;
					
					$fqu = "select `total-att` from student where s_id = '$temp'";
					if($res3 = $conn->query($fqu)){
						//echo "<br>--".mysqli_affected_rows($conn)."--<br>";
						$total_att = $res3->fetch_assoc();
						$total_att = $total_att['total-att'];
						if($val > 10 || $val < 0){
							die("Please enter a valid SPI(0 to 10) <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
						}else{
							$fir = "select * from semwisesturec where s_id = '$temp' AND sem = '$sem'";
							if($res5 = $conn->query($fir)){
								$data2 = $res5->fetch_assoc();
								if(empty($data2)){
									if(trim($temp) != NULL && trim($sem) != NULL && trim($total_att) != NULL && trim($val) != NULL){
										$qu = "insert into semwisesturec(`s_id`,`sem`,`total-attend`,`spi`,`performance-status`,`uid`) values('$temp','$sem','$total_att','$val','-',DEFAULT)";
										if($res4 = $conn->query($qu)){
											//echo "Success(spi)! <br>";
										}else{

											$flag_spi += 1;
										}
									}else{
										die("Please fill all details (White spaces not allowed) !  <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
									}
								}else{
									die("Record already exists !  <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
								}
							}else{
								die("Failed to retrieve semwise record ! Mysql Error -> ".mysqli_error($conn)." <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
							}
							//echo '<br>--<br>'.$temp."<br>--<br>";
						}
					}else{
						echo "Mysql error -> ".mysqli_error($conn);
					}
				}
			}
			//print_r($data);
			if($flag_spi != 0){
				echo "Failed to insert records of ".$flag_spi." Students !";
			}
			echo "<br><br>";
			//print_r($data);
			foreach($data as $att=>$val){
				if(strpos($att, 'perf')){
					$temp = chop($att,"perf");
					//print_r($data);
					//echo "<br>--".mysqli_affected_rows($conn)."--<br>";
					if(strlen($temp) > 20){
						echo "Please enter 'performance-status' within 20 Charactors ! We filled first 20 charactors";
					}
					$qu = "update semwisesturec set `performance-status` = '$val' where s_id = '$temp' AND sem = '$value'";
					//echo "<br>--<br>".$val."<br>--<br>";
					//echo '-'.$val."-<br>";
					if($res4 = $conn->query($qu)){
						//echo "<br>---<br>".mysqli_affected_rows($conn).$temp."<br>--<br>";
						//echo "Success(perf)! <br>";
					}else{
						$flag_spi += 1;
					}
				}
			}
			if($flag_perf != 0){
				echo "Failed to insert records of ".$flag_spi." Students !";
			}
			if($flag_spi == 0 && $flag_perf == 0){
				echo "Semwise student record submit success !";
			}
			echo "<br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>";
		}else{
			echo("Please fill all details (White spaces not allowed) !  <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/sstu_rec_sb.php'>Go to form</a>");
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