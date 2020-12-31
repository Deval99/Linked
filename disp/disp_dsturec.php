<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Daily Student Record</title>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'> -->
  <link rel='stylesheet' href='disp/css/reset.min.css'>
      <link rel='stylesheet' href='disp/css/style.css'>
      <link rel='stylesheet' href='disp/css/style1.css'>
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

      if (@$_SESSION['utype'] == 'admin') {
        die("<h1 style='padding-top:30px;'>This page is not for admin !");
      //   echo "<div class='sort'><form action='disp_dsturec.php'method='POST'>
      //   <input name='col' type='textbox' placeholder='Column Name'></input>
      // <input name='value' type='textbox' placeholder='Value'></input>
      // <input type='submit' value='Sort'></input>
      // </form></div>";
      //   $col = $_POST['col'];
      //   $value = $_POST['value'];
      //   if(!empty($col) && !empty($value)){
      //     $query="select * from dailysturec where $col = '$value' ORDER BY date DESC";
      //   }else{
      //     $query="select * from dailysturec ORDER BY date DESC";
      //   }
      }
      echo "<h1 style='padding-top:30px;'>Daily Student Record</h1>";
      if(@$_SESSION['utype'] == 'student'){
          $id = $_SESSION['id'];
          $query="select * from dailysturec where s_id = '$id' ORDER BY date DESC";
      }

      if (@$_SESSION['utype'] == 'parent') {
        //$pid = $_SESSION['id'];
            $sid = $_SESSION['p_sid'];
        $query="select * from dailysturec where s_id = '$sid' ORDER BY date DESC";
      }

      if (@$_SESSION['utype'] == 'admin') {
        die("<h1>This page is not for admin !");
      //   echo "<div class='sort'><form action='disp_dsturec.php'method='POST'>
      //   <input name='col' type='textbox' placeholder='Column Name'></input>
      // <input name='value' type='textbox' placeholder='Value'></input>
      // <input type='submit' value='Sort'></input>
      // </form></div>";
      //   $col = $_POST['col'];
      //   $value = $_POST['value'];
      //   if(!empty($col) && !empty($value)){
      //     $query="select * from dailysturec where $col = '$value' ORDER BY date DESC";
      //   }else{
      //     $query="select * from dailysturec ORDER BY date DESC";
      //   }
      }


      if (@$_SESSION['utype'] == 'lecturer') {
        echo "<center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i></center>";
        echo "<div class='sort'>
        <div class='container'>
        <form action='disp_dsturec.php'method='POST'>
        <h4 style='padding-right:25%;'>Select Column:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4>
        <select name='col' id='soflow'>
          <option value='s_id'>Student ID</option>
          <option value='home-work'>Work Not Done(Don't enter value) &nbsp; &nbsp; &nbsp;</option>
          <option value='present?'>Not Present(Don't enter value)</option>
        </select>
      <input name='value' type='text' placeholder='Value'></input>
      <button type='submit' class='btn ripple'>Sort</button>
      </form></div></div></table><br>";
        $col = @mysqli_real_escape_string($conn, $_POST['col']);
        $value = @mysqli_real_escape_string($conn, $_POST['value']);
        $mydept = $_SESSION['dept'];
        if(!empty($col)){
          if($col == 's_id'){
            if(!empty($value)){
              $query="select * from dailysturec inner join student on dailysturec.s_id = student.s_id where dailysturec.s_id = '$value' AND student.dept = '$mydept' ORDER BY dailysturec.date DESC";
            }else{
              $query="select * from dailysturec inner join student on dailysturec.s_id = student.s_id where student.dept = '$mydept' ORDER BY dailysturec.date DESC,dailysturec.s_id ASC";
            }
          }else if($col == 'home-work'){
            $query="select * from dailysturec inner join student on dailysturec.s_id = student.s_id where `home-work` != 'TRUE' AND student.dept = '$mydept' ORDER BY dailysturec.date DESC,dailysturec.s_id ASC";
          }else if($col == 'present?'){
            $query="select * from dailysturec inner join student on dailysturec.s_id = student.s_id where `present?` != 'TRUE' AND student.dept = '$mydept' ORDER BY dailysturec.date DESC,dailysturec.s_id ASC";
          }
          //$query="select * from dailysturec where $col = '$value' ORDER BY date DESC";
        }else{
          $query="select * from dailysturec inner join student on dailysturec.s_id = student.s_id where student.dept = '$mydept' ORDER BY dailysturec.date DESC,dailysturec.s_id ASC";
        }
} 
echo "
  <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
        <tr>
          <th>S ID</th><th>Not Present In Lecture Of,</th><th>Date</th><th>HomeWork Not Done Of Subject,</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <tbody> " ; 
        
        
          if($queryrun = $conn->query($query)){ 
            while ($data = $queryrun->fetch_assoc()){
              echo '<tr><td>'.$data['s_id'].'</td><td>'.$data['present?'].'</td><td>'.$data['date'].'</td><td>'.$data['home-work'].'</td></tr>';
            }
          }else{
            echo "Mysql error = ".mysqli_error($conn);
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