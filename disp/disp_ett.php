<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mid sem exam time table</title>
  
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="disp/css/reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" href="disp/css/style1.css">
  
<style type="text/css">
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head>
<body> <section>
  <center><a href="../index.php" class="nav-item">Go to home page</a></center>
<?php
session_start();

if(isset($_SESSION['utype']) && !empty($_SESSION['utype'])){
    echo "<h1 style='margin:30px'>Mid sem exam time table</h1>";
    require('../p/linked_conn.php'); //s_id,present?,date,homework

      if(@$_SESSION['utype'] == 'student'){
          $var = $_SESSION['dept'];
          $c_sem = $_SESSION['sem'];
          $query="select * from examtimetable where dept = '$var' AND sem = '$c_sem' ORDER BY `date`";
      }

      if (@$_SESSION['utype'] == 'parent') {
        
        $c_sem = $_SESSION['sem'];
        $dept = $_SESSION['dept'];
       
        $query="select * from examtimetable where dept = '$dept' AND sem = '$c_sem' ORDER BY `date`";
          //echo $_SESSION['dept'].$_SESSION['sem'];
      }


      if (@$_SESSION['utype'] == 'admin' ) { 
        echo "<br><center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i></center>
      <center><div class='sort' style='margin:20px;'>
      <div class='container'>
      <form action='#'method='POST'>
      <h4 style='padding-right:160px;'>Select Column: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4>
            <select name='col' id='soflow'>
              <option value='dept'>Department (e.x. Computer) &nbsp;; &nbsp;; &nbsp;; &nbsp;;</option>
              <option value='sem'>Semester (e.x. 1)</option>
            </select>
          <input name='value' type='text' placeholder='Value'></input>
          <button type='submit' class='btn ripple'>Sort</button>
          </form></div></div></center>";

            $col = mysqli_real_escape_string($conn, @$_POST['col']);
            $value = mysqli_real_escape_string($conn, @$_POST['value']);
            if(!empty($col)){
              if($col == 'dept'){
                if(!empty($value)){
                  $query="select * from examtimetable where dept = '$value' ORDER BY `sem` DESC" ;
                }else{
                  $query="select * from examtimetable ORDER BY `sem` DESC,`dept`" ;
                }
              }else if($col == 'sem'){
                if(!empty($value)){
                  $query="select * from examtimetable where sem = '$value' ORDER BY `dept`" ;
                }else{
                  $query="select * from examtimetable ORDER BY `sem` DESC,`dept`" ;
                }
              }
            }else{
              $query="select * from examtimetable ORDER BY `sem` DESC,`dept`" ;
            }
          //$query="select * from examtimetable ORDER BY `date` DESC,`dept`" ;
      }
      if(@$_SESSION['utype'] == 'lecturer'){
        $query="select * from examtimetable where `dept` = '$_SESSION[dept]' ORDER BY `sem` DESC, date ASC" ;
      }
      echo"</table>
            <div class='tbl-header'>
              <table cellpadding='0' cellspacing='0' border='0'>
                <thead>
                  <tr> 
                    <th>Subject</th><th>Semester</th><th>Department</th><th>Time(24h format)</th><th>Date(y-m-d)</th>
                  </tr>
                </thead>
              </table>
            </div>
            <div class='tbl-content'>
              <table cellpadding='0' cellspacing='0' border='0'>
                <tbody> <!-- subject,dept,time,date -->
      ";
      if(isset($query)){
      	//print_r($_SESSION);
        if($queryrun = $conn->query($query)){ 
          while ($data = $queryrun->fetch_assoc()){
            echo "<tr><td>".$data['subject']."</td><td>".$data['sem']."</td><td>".$data['dept']."</td><td>".$data['time']."</td><td>".$data['date']."</td></tr>";
          }
          echo "</tbody> </table> </div>";
        } 
      }
}else{
  echo "<h1 style='margin:30px'>Please Login !!</h1>";
  //print_r($_SESSION);
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
