<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Weekly Time Table</title>
  
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="disp/css/reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" href="disp/css/style1.css">
  
<style type="text/css">
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head>
<body>
  <section>
  <center><a href="../index.php" class="nav-item">Go to home page</a></center>
<?php
session_start();

if(isset($_SESSION['utype']) && !empty($_SESSION['utype'])){
    echo "<h1 style='margin:30px'>Weekly Time Table</h1>";
    require('../p/linked_conn.php'); //s_id,present?,date,homework

      if(@$_SESSION['utype'] == 'student'){
        $id = $_SESSION['id'];
        $queryz = "select * from student where s_id = '$id'";
        if($queryrun = $conn->query($queryz)){
        	while ($data = $queryrun->fetch_assoc()){
        			$_SESSION['dept'] = $data['dept'];
        	}
        }
        $var = $_SESSION['dept'];
        $query="select * from weeklytimetable where dept = '$var' ORDER BY `index`";
      }

      if (@$_SESSION['utype'] == 'parent') {
        $id = $_SESSION['id'];

        $sid = $_SESSION['p_sid'];
        $queryz = "select * from student where s_id = '$sid'";
        if($queryrun = $conn->query($queryz)){
          while ($data = $queryrun->fetch_assoc()){
              $_SESSION['dept'] = $data['dept'];
          }
        }
          $var = $_SESSION['dept'];
          $query="select * from weeklytimetable where dept = '$var' ORDER BY `index`";
      }


      if (@$_SESSION['utype'] == 'admin' ) {
        echo "<center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i></center>";
      echo "<div class='sort'>
        <div class='container'>
        <form action='#' method='POST'>
      <h4 style='padding-right:120px;'>Select Column: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter Value: </h4><select name='col' id='soflow'>
        <option value='Def' >Select</option>
        <option value='dept'>Department (ex. Computer)</option>
      </select>
        
      <input name='value' type='text' placeholder='Value (Case Insensitive)'></input>
      <button type='submit' class='btn ripple'>Sort</button>
      </form></div></div><br>";
        $col = mysqli_real_escape_string($conn, @$_POST['col']);
        $value = mysqli_real_escape_string($conn, @$_POST['value']);
        if(!empty($col)){
          if($col == 'Def'){
            $query = "select * from weeklytimetable ORDER BY `dept`,`index`";
          }else if($col == 'dept'){
            if(!empty($value)){
              $query = "select * from weeklytimetable where $col = '$value' ORDER BY `dept`,`index`";
            }else{
              echo "Please fill value !";
              $query = "select * from weeklytimetable ORDER BY `dept`,`index`";
            }
          }
        }else{
          $query = "select * from weeklytimetable ORDER BY `dept`,`index`";
        }
        //$query="select * from weeklytimetable ORDER BY `dept`,`index`" ;
      }
      if(@$_SESSION['utype'] == 'lecturer'){
        $query="select * from weeklytimetable where `dept` = '$_SESSION[dept]' ORDER BY `index`" ;
      }
      echo"</table>
           
          <div class='tbl-header'>
        <table cellpadding='0' cellspacing='0' border='0'>
          <thead>
            <tr>
              <th>Index</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Dept</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class='tbl-content'>
        <table cellpadding='0' cellspacing='0' border='0'>
          <tbody>
      ";
      if(isset($query)){
        if($queryrun = $conn->query($query)){ 
          while ($data = $queryrun->fetch_assoc()){
            echo "<tr><td>".$data['index']."</td><td>".$data['monday']."</td><td>".$data['tuesday']."</td><td>".$data['wednesday']."</td><td>".$data['thursday']."</td><td>".$data['friday']."</td><td>".$data['saturday']."</td><td>".$data['dept']."</td>";
          }
        }else{
          echo "Mysql error -> ".mysqli_error($conn);
        } 
      }
}else{
  echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../../index.php ',303,false);
}
?>
        </table>
      </tbody>
    </table>
  </div>
</section>
<!-- follow me template -->
<div class="made-with-love">
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="disp/js/index.js"></script>

</body>
</html>
