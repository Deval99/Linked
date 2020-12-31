<!-- new -->
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Surprise test marks submit PHP</title>
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
die("Please fill all fields !<br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a>");
  -->
<?php
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
	if($_SESSION['utype'] == 'lecturer'){
		$data = $_POST; //mysqli_real_escape_string($conn, $_POST);
		
		//print_r($data);
	  if(!empty($data)){
		foreach ($data as $key => $value) {
			$data[$key] = mysqli_real_escape_string($conn, $value);
		}

		$stu_arr = NULL;
		$mark_arr = NULL;
		//print_r($data);
		//ARRAY ( [S01SPI] => 1 [S01PERF] => 2 [S44SPI] => 3 [S44PERF] => 4 )
		settype($stu_arr, "array");
		settype($mark_arr, "array");
		//---------------------------
		$l_id = $_SESSION['id'];
		$dept = $_SESSION['dept'];
		foreach ($data as $key => $value) {
			if($key == "sem"){
				$sem = $value;
			}else if($key == "subj"){
				$subj = $value;
			}else if($key == "t_id"){
				$t_id = $value;
			}else if($key == "t_marks"){
				$t_marks = $value;
			}
		}
		settype($t_id, "integer");
		
		if(count($data) == 3 || count($data) == 4){
			die("Please fill all fields !<br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a><div class='made-with-love'>
				 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
				</div>");
		}
		//echo $sem;
		//$sem = $_POST['sem'];
		$first = "select * from student where c_sem = '$sem'";
              if($res = $conn->query($first)){
                $data9 = $res->fetch_assoc();
                //Array ( [l_id] => L01 [l_name] => QW [dept] => Computer [subj] => CP [subj2] => ACP [subj3] => DBMS [subj4] => ADBMS [subj5] => JAVA [subj6] => AJAVA [exp] => 5 [salary] => 50000 [sub_id] => 1 [sub_name] => JAVA [sem] => 5 )
                if($data9 == NULL){
                	die("There are no students in this sem or department ! <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a><div class='made-with-love'>
						 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
						</div>");
                }
              }else{
                die("Mysql error-> ".mysqli_error($conn)."<div class='made-with-love'>
					 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
					</div>");
              }
		//---------------------------
            $flag = NULL;
            settype($flag, "string");
            $flag_mark = 0;
            //print_r($data);
            //Array ( [t_marks] => 22 [S01mark] => 21 [subj] => AJAVA [t_id] => 10 [sem] => 6 [S44mark] => 21 )
			foreach($data as $att=>$val){
				if($att == 't_marks'){
					continue;
				}
				if(strpos($att, 'mark')){
					$temp = chop($att,"mark");
					settype($val, "integer");
					if($val > $t_marks || $val < 0){
						die("Marks of student ID ".$temp." is greater than max marks(100) or less than min marks(0) !

							<br>Submission aborted from here ! <br> Some records may have submitted, please delete all records of Test ID ".$t_id.". And re-insert ! <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a>

							<div class='made-with-love'>
							 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
							</div>");
					}
					////echo $temp;
					//print_r($data);
					//array_push($spi_arr, $temp);
					////$arr = array($spi_arr, $perf_arr);
					//print_r($arr);
					//Array ( [0] => Array ( [0] => S01 [1] => S44 ) [1] => Array ( [0] => S01 [1] => S44 ) ) 
					//0 = spi_arr, 1 = perf_arr;

					$fir = "select * from randomtest where s_id = '$temp' AND t_id = '$t_id'";
					if($res5 = $conn->query($fir)){
						$data2 = $res5->fetch_assoc();
						if(empty($data2)){
							$date = Date('Y-m-d');
							$qu = "insert into randomtest(`t_id`,`l_id`,`s_id`,`subject`,`marks`,`t_marks`,`date`,`uid`) values('$t_id','$l_id','$temp','$subj','$val','$t_marks','$date',DEFAULT)";
							if($res4 = $conn->query($qu)){
								//echo "Success(spi)! <br>";
							}else{
								$flag_spi += 1;
							}
						}else{
							die("Record already exists ! <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a><div class='made-with-love'>
								 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
								</div>");
						}
					}else{
						die("Failed to retrieve Surprise test record ! Mysql Error -> ".mysqli_error($conn)." <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a><div class='made-with-love'>
							 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
							</div>");
					}
							//echo '<br>--<br>'.$temp."<br>--<br>";
				}
			}
			//print_r($data);
			if($flag_mark != 0){
				echo "Failed to insert records of ".$flag_mark." Students !";
			}
			echo "<br><br>";
			//print_r($data);
			if($flag_mark == 0){
				echo "Surprise test record submit success !";
			}
			echo "<br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a>";
		}else{
			echo("Please fill all details ! <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a>");
		}
		}else{
			echo "This Page Is Only For Faculty ! <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a>";
		}
	}else{
		echo "Please Login First ! <br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a>";
	}
?></h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../../disp/disp/js/index.js'></script>

</body>
</html>