<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Surprise test marks delete(bulk)</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
  <link rel='stylesheet' href='../../disp/disp/css/style_link.css'>
  <link rel='stylesheet' href='style.css'>
</head>
<body> 
  <center style='margin-top: 30px;'><a  class='nav-item' href="../../index.php">Go to home</a></center>
  <?php @session_start(); if(isset($_SESSION['utype'])){ if(@$_SESSION['utype'] == 'lecturer'){ ?>
  <form style='margin-top: 1%;' action='../../p/lec/r_test_db.php' method='POST'>
  <h1>Surprise test marks delete(bulk)</h1><br/>
  <!-- sid,sem,total-attend,spi,performance-status -->
  <h5>Enter Semester Carefully,</h5><br><h4>IT WILL DELETE ALL RECORDS OF THAT Test ID !(only for tests which are conducted by you.)</h4>
  <br>
<h5>Enter test id -> </h5>
  <input type="number" onkeydown='javascript: return event.keyCode == 69 ? false : true;' name="t_id" required >
  <br><br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../temp/js/index.js'></script> <?php } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For HOD ! <br><br><a class='nav-item' href='../../index.php'>Go to home</a></center>";
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br><a class='nav-item' href='../../index.php'>Go to home</a></center>";
  }
?> 
