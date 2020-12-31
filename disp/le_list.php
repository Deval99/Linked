<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Lecturers Details</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="disp/css/reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" type="text/css" href="disp/css/style1.css">
<style type="text/css">
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head>
<body><section>

  <center><a href="../index.php" class="nav-item">Go to home page</a></center>
<?php
session_start();
require('../p/linked_conn.php'); //s_id,present?,date,homework
 if(isset($_SESSION['utype'])){
 	if($_SESSION['utype'] == 'admin'){
    	echo "<h1 style='padding-top:50px;'>Lecturer / Professor Details</h1><br><center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i></center>
    	<div class='sort'><div class='container'><form action='le_list.php' method='POST'>
			<h4 style='padding-right:160px;'>Select Column: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter Value: </h4>
			<select name='col' id='soflow'>
			  <option value='Def'>Select</option>
			  <option value='l_id'>Lecturer ID (ex. L01)</option>
			  <option value='l_name'>Lecturer Name</option>
			  <option value='exp'>Experience (ASC or DSC or Numeric_Value(1,2,..))</option>
			  <option value='subj'>Subject</option>
			</select>
			  
			<input name='value' type='text' placeholder='Value (Case Insensitive)'></input>
			<button class='btn ripple' type='submit'>Sort</button>
			</form></div></div><br><br>";
			$col = mysqli_real_escape_string($conn, @$_POST['col']);
  			$value = mysqli_real_escape_string($conn, @$_POST['value']);
  			if(!empty($col) && !empty($value)){
	  			if($col == 'Def'){
	  				$query = "select * from lecturer";
	  			}else{
	  				if($col == 'exp'){
	  					if($value == 'ASC' || $value == 'DESC' || $value == 'asc' || $value == 'desc'){
	  						$value = strtoupper($value);
	  						$query = "select * from lecturer ORDER BY $col $value";
	  					}else{
	  						$query = "select * from lecturer where `exp` = '$value'";
	  					}
	  				}else if($col == 'subj'){
	  					if(!empty($value)){
	  						$query = "select * from lecturer where subj = '$value' OR subj2 = '$value' OR subj3 = '$value' OR subj4 = '$value' OR subj5 = '$value' OR subj6 = '$value'";
	  					}else{
	  						$query = "select * from lecturer";
	  					}
	  				}else{
	  					$query = "select * from lecturer where $col = '$value'";
	  				}
	  			}
	  		}else{
	  			$query = "select * from lecturer";
	  		}
	  		echo"
	  		<div >
	   	    <div class = 'tbl-header'>
			    <table  cellpadding='0' cellspacing='0' border='0'>
			      <thead>
			        <tr>
			          <th>Lecturer ID</th><th>Lecturer Name</th><th>Experience</th><th>Department</th><th>Subject 1</th><th>Subject 2</th><th>Subject 3</th><th>Subject 4</th><th>Subject 5</th><th>Subject 6</th>
			        </tr>
			      </thead>
			    </table>
			</div>
			<div class='tbl-content'>
			    <table cellpadding='0' cellspacing='0' border='0'>
			      <tbody> ";
			$mq = $conn->query($query);
			if($run = $mq){
				while($data = $run->fetch_assoc()){
					echo "<tr><td>".$data['l_id']."</td><td>".$data['l_name']."</td><td>".$data['exp']."</td><td>".$data['dept']."</td><td>".$data['subj']."</td><td>".$data['subj2']."</td><td>".$data['subj3']."</td><td>".$data['subj4']."</td><td>".$data['subj5']."</td><td>".$data['subj6']."</td></tr>";
				}
			}
			echo"</table>
				      </tbody>
				    </table>
				  </div>
				</section>";
	}else if($_SESSION['utype'] == 'lecturer'){
		echo "<h1 style='padding-top:50px;'>My Details</h1>";
		echo"<br><br>
	  		<div >
	   	    <div class = 'tbl-header'>
			    <table  cellpadding='0' cellspacing='0' border='0'>
			      <thead>
			        <tr>
			          <th>My ID</th><th>My Name</th><th>Department</th><th>Experience</th><th>Subject 1</th><th>Subject 2</th><th>Subject 3</th><th>Subject 4</th><th>Subject 5</th><th>Subject 6 
			        </tr>
			      </thead>
			    </table>
			</div>
			<div class='tbl-content'>
			    <table cellpadding='0' cellspacing='0' border='0'>
			      <tbody> ";
			      $query = "select * from lecturer where `l_id` = '$_SESSION[id]'";
			$mq = $conn->query($query);
			if($run = $mq){
				while($data = $run->fetch_assoc()){
					echo "<tr><td>".$data['l_id']."</td><td>".$data['l_name']."</td><td>".$data['dept']."</td><td>".$data['exp']."</td><td>".$data['subj']."</td><td>".$data['subj2']."</td><td>".$data['subj3']."</td><td>".$data['subj4']."</td><td>".$data['subj5']."</td><td>".$data['subj6']."</td></tr>";
				}
			}
			echo"</table>
				      </tbody>
				    </table>
				  </div>
				</section>";
	}else{
		echo "<h1>Please Login As Admin !!</h1>";
	}
 } else{
 	echo "<h1>Please Login !!</h1>";
 }
?>
<!-- follow me template -->
<div class="made-with-love">
 <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="disp/js/index.js"></script>

</body>
</html>