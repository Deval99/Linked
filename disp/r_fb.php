<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Read Feedback</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" type="text/css" href="disp/css/style1.css">
      <link rel="stylesheet" type="text/css" href="disp/css/style_link.css">
<style type="text/css">
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head>
<body><section>
	<center><a href="../index.php" class="nav-item">Go to home page</a></center>
<?php
session_start();
require('../p/linked_conn.php'); //f_id,p_id,subject,details,date
 if(isset($_SESSION['utype'])){
 	if($_SESSION['utype'] == 'admin'){
    	echo "<h1 style='padding-top:30px;'>Read Feedback</h1><br><center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i></center>";
    	echo "<div class='sort'>
    		<div class='container'>
    		<form action='r_fb.php' method='POST'>
			<h4 style='padding-right:120px;'>Select Column: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter Value: </h4><select name='col' id='soflow'>
			  <option value='Def' >Select</option>
			  <option value='f_id'>Feedback ID (ex. 1) &nbsp; &nbsp; &nbsp; &nbsp;</option>
			  <option value='p_id'>Parent ID (ex. P01)</option>
			</select>
			  
			<input name='value' type='text' placeholder='Value (Case Insensitive)'></input>
			<button type='submit' class='btn ripple'>Sort</button>
			</form></div></div><br>";
			$col = mysqli_real_escape_string($conn, @$_POST['col']);
  			$value = mysqli_real_escape_string($conn, @$_POST['value']);

  			if(!empty($col)){
	  			if($col == 'Def'){
	  				$query = "select * from feedback ORDER BY `date` DESC";
	  			}else{
	  				if($col == 'f_id' || $col == 'p_id'){
	  					if(!empty($value)){
	  						$query = "select * from feedback where $col = '$value' ORDER BY `date` DESC";
	  					}else{
	 						echo "Please enter value !";
	  						$query = "select * from feedback ORDER BY `date` DESC";
	  					}
	  				}
	  			}
	  		}else{
	  			$query = "select * from feedback ORDER BY `date` DESC";
	  		}//f_id,p_id,subject,details,date
	  		echo"
	  		<div >
	   	    <div class = 'tbl-header'>
			    <table  cellpadding='0' cellspacing='0' border='0'>
			      <thead>
			        <tr>
			          <th>Feedback ID</th><th>Parent ID</th><th>Subject</th><th>Details</th><th>Date(y-m-d)</th> 
			        </tr>
			      </thead>
			    </table>
			</div>
			<div class='tbl-content'>
			    <table cellpadding='0' cellspacing='0' border='0'>
			      <tbody> "; 
			if($run = $conn->query($query)){
				while($data = $run->fetch_assoc()){
					echo "<tr><td>".$data['f_id']."</td><td>".$data['p_id']."</td><td>".$data['subject']."</td><td><textarea readonly>".$data['details']."</textarea></td><td>".$data['date']."</td></tr>";
				}
			}else{
				echo "Mysql Query Failed -- Error = ".mysqli_error($conn);
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