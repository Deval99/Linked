<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title> Surprise Test Marks</title> 
       
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
require('../p/linked_conn.php'); //s_id,present?,date,homework
if(isset($_SESSION) && !empty($_SESSION['utype'])){
      if(@$_SESSION['utype'] == 'admin'){
        die("<h1 style='padding-top:30px;'>This page is not for admin !</h1>");
      }
      echo "<h1 style='padding-top:30px;'>Surprise Test Marks</h1>";
      if(@$_SESSION['utype'] == 'student'){
          $id = $_SESSION['id'];
          $query="select * from randomtest where s_id = '$id' ORDER BY date DESC";
      }

      if (@$_SESSION['utype'] == 'parent') {
        echo "<div class='sort'>
        <div class='container'>
        <form action='#'method='POST'>
        <h4 style='padding-right:21%;'>Select Column:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4>
        <select name='col' id='soflow'>
          <option value='subject'>Subject</option>
          <option value='date'>Date (DESC default, Write ASC to sort ascending)</option>
          <option value='marks'>Marks (DESC default, Write ASC to sort ascending)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>
        </select>
      <input name='value' type='text' placeholder='Value'></input>
      <button type='submit' class='btn ripple'>Sort</button>
      </form></div></div>";
        $col = mysqli_real_escape_string($conn, @$_POST['col']);
        $value = mysqli_real_escape_string($conn, @$_POST['value']);
        $id = $_SESSION['p_sid'];
        //t_id, s_id subject, marks, date
        if(!empty($col)){
          if($col == 'subject'){
            if(empty($value)){
              $query="select * from randomtest where s_id = '$id' ORDER BY date DESC";
            }else{
              
              $query="select * from randomtest where s_id = '$id' AND subject = '$value' ORDER BY date DESC";
            }
          }else if($col == 'date'){
            if($value == 'ASC' || $value == 'asc'){
              $query="select * from randomtest where s_id = '$id' ORDER BY date ASC";
            }else{
              $query="select * from randomtest where s_id = '$id' ORDER BY date DESC";
            }
          }else if($col == 'marks'){
            echo "<br>*marks are sorted in groups of subject(there are highest/lowest marks for every subject)<br>";
            if($value == 'ASC' || $value == 'asc'){
              $query="select * from randomtest where s_id = '$id' ORDER BY subject, marks ASC,date ASC";
            }else{
              $query="select * from randomtest where s_id = '$id' ORDER BY subject,marks DESC,date ASC";
            }
          }
        }else{
          $query="select * from randomtest where s_id = '$id' ORDER BY date DESC";
        }
        //$query="select * from randomtest where s_id = '$id' ORDER BY date DESC";
      }

     
      if (@$_SESSION['utype'] == 'lecturer') {
         echo "<div class='sort'>
         <div class='container'>
         <form action='#'method='POST'>
         <h4 style='padding-right:22%;'>Select Column: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4>
          <select name='col' id='soflow'>
          <option value='subject'>Subject</option>
          <option value='date'>Date (DESC default, Write ASC to sort ascending)</option>
          <option value='marks'>Marks (DESC default, Write ASC to sort ascending)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>
          <option value='s_id'>Student ID</option>
          <option value='t_id'>Test ID</option>
          </select>
          <input name='value' type='text' placeholder='Value'></input>
          <button type='submit' class='btn ripple'>Sort</button>
          </form></div></div>";
        $col = mysqli_real_escape_string($conn, @$_POST['col']);
        $value = mysqli_real_escape_string($conn, @$_POST['value']);
        $dept = $_SESSION['dept'];
        //t_id, s_id subject, marks, date
        if(!empty($col)){
          if($col == 'subject'){
            if(!empty($value)){
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' AND subject = '$value' ORDER BY date DESC";
            }else{
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' ORDER BY date DESC";
            }
          }else if($col == 'date'){
            if($value == 'ASC' || $value == 'asc'){
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' ORDER BY date ASC";
            }else{
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' ORDER BY date DESC";
            }
          }else if($col == 'marks'){
            echo "<br>*Marks are sorted by dates, there are different highest/lowest marks for different dates.<br>";
            if($value == 'ASC' || $value == 'asc'){
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' ORDER BY date ASC,marks ASC";
            }else{
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' ORDER BY date ASC,marks DESC";
            }
          }else if($col == 's_id'){
            if(empty($value)){
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' ORDER BY date DESC";
            }else{
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.s_id = '$value' AND student.dept = '$dept' ORDER BY date DESC";
            }
          }else if($col == 't_id'){
            if(empty($value)){
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' ORDER BY date DESC";
            }else{
              $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' AND t_id = '$value' ORDER BY date DESC";
            }
          }
        }else{
          $query="select * from randomtest inner join student on student.s_id = randomtest.s_id where student.dept = '$dept' ORDER BY date DESC";
        }
      } 
       echo "<br><br>";
echo "
  <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
        <tr><!-- t_id,s_id,subject,marks,date -->
          <th>T_ID</th><th>S_ID</th><th>Subject</th><th>Marks</th><th>Date</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <tbody> " ; 
        
        
          if($queryrun = $conn->query($query)){ 
            while ($data = $queryrun->fetch_assoc()){
              echo '<tr><td>'.$data['t_id'].'</td><td>'.$data['s_id'].'</td><td>'.$data['subject'].'</td><td>'.$data['marks'].'</td><td>'.$data['date'].'</td>';
            }
          }else{
            echo $query."Mysql Error -> ".mysqli_error($conn);
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
 <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='disp/js/index.js'></script>

</body>
</html>