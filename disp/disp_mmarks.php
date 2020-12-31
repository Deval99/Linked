<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Mid-Semester Examination Marks </title> 

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="disp/css/reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" href="disp/css/style1.css">
  
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head>
<body>
  <section>
  <center><a href="../index.php" class="nav-item">Go to home page</a></center> 
<?php
session_start();
require('../p/linked_conn.php'); //s_id,subject,marks,dept
if(isset($_SESSION) && !empty($_SESSION['utype'])){
      echo "<h1 style='padding-top:30px;'>Mid-Semester Examination Marks</h1>";
      if(@$_SESSION['utype'] == 'student'){
          $id = $_SESSION['id'];
          $sem = $_SESSION['sem'];
          $query="select * from midmarks where s_id = '$id' AND sem = $sem ORDER BY `subject`";
      }

      if (@$_SESSION['utype'] == 'parent') {
        $id = $_SESSION['p_sid'];
        $sem = $_SESSION['sem'];
        $query="select * from midmarks where s_id = '$id' AND sem = $sem";
      }

      if (@$_SESSION['utype'] == 'lecturer') {
        echo "<center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i></center>";
        echo "<div class='sort'>
          <div class='container'>
          <form action='#'method='POST'>
          <h4 style='padding-right:19%;'>Select Column:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4>
          <select name='col' id='soflow'>
            <option value='sem'> Semester (e.x. 1) </option>
            <option value='subject'> Subject (e.x. JAVA) </option>
            <option value='s_id'> Student ID (e.x. S01) </option>
            <option value='marks'> Marks (Default DESC, Enter ASC to Retrieve in Ascending) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>
          </select>
          <input name='value' type='text' placeholder='Value'></input>
          <button type='submit' class='btn ripple'>Sort</button>
          </form></div></div></table><br><br>";
        $col = @$_POST['col'];
        $value = @$_POST['value'];
        if($col != NULL){
          if($col == 'sem'){
            if(!empty($value)){
              if($value < 1 || $value > 6 ){
                echo "Please Enter Semester Value Between 1 and 6";
                $query="select * from midmarks ORDER BY s_id, sem DESC";
              }else{
                $query="select * from midmarks where sem = $value ORDER BY s_id ASC";
              }
            }else{
              $query="select * from midmarks ORDER BY sem DESC, s_id ASC";
            }
          }
          if($col == 'subject'){
            if(!empty($value)){
              $query="select * from midmarks where `subject` = '$value' ORDER BY sem DESC, s_id ASC";
            }else{
              $query="select * from midmarks ORDER BY sem DESC, subject ASC";
            }
          }
          if($col == 's_id'){
            if(!empty($value)){
              $query="select * from midmarks where `s_id` = '$value' ORDER BY sem DESC";
            }else{
              $query="select * from midmarks ORDER BY s_id ASC, sem DESC";
            }
          }
          if($col == 'marks'){
            echo "*Marks are sorted by Subject, the first row indicates he/she has highest or lowest marks in his/her Subject.";
            if($value == 'asc' || $value == 'ASC'){
              $query="select * from midmarks ORDER BY subject DESC, marks ASC";
            }else{
              $query="select * from midmarks ORDER BY subject DESC, marks DESC";
            }
          }
        }else{
          $query="select * from midmarks ORDER BY sem DESC, s_id ASC";
        }
      }

    //   if (@$_SESSION['utype'] == 'admin' || @$_SESSION['utype'] == 'lecturer') {
    //     echo "<div class='sort'><form action='disp_dsturec.php'method='POST'>
    //     <input name='col' type='textbox' placeholder='Column Name'></input>
    //   <input name='value' type='textbox' placeholder='Value'></input>
    //   <input type='submit' value='Sort'></input>
    //   </form></div></table>";
    //     $col = $_POST['col'];
    //     $value = $_POST['value'];
    //     if(!empty($col) && !empty($value)){
    //       $query="select * from midmarks where $col = '$value'";
    //     }else{
    //       $query="select * from midmarks";
    //     }
      
    // } 
echo "
  <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
        <tr><!-- t_id,s_id,subject,marks,date -->
          <th>S_ID</th><th>Subject</th><th>Marks</th><th>Semester</th><th>Department</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <tbody> " ; 
          if($queryrun = $conn->query($query)){ 
            while ($data = $queryrun->fetch_assoc()){
              echo '<tr><td>'.$data['s_id'].'</td><td>'.$data['subject'].'</td><td>'.$data['marks'].'</td><td>'.$data['sem']."</td><td>".$data['dept'].'</td></tr>';
            }
          }else{
            echo mysqli_error($conn);
          }
          echo "</table>
      </tbody>
    </table>
  </div>
</section>";
  
 }else{
  echo "<h1 style='margin:30px'>Please Login !!</h1>";
}
?>  

<!-- follow me template -->
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='disp/js/index.js'></script>

</body>
</html>