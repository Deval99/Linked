<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Student Details Update</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
  <style type="text/css">
    th,td{padding: 3px;}
  </style>
</head>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/s_det_u.php' method='POST'>
  <h1>Student Details Update</h1><br/>
<br><br><h5>Please enter current SID, and you can enter new Details(except SID)</h5>
<!--//s_id, s_name, total-att, sem,dept,fees_p-->
  
  <span class='input' ></span>
  <input type='text' maxlength='10' required  name='s_id' placeholder='Student ID ex.S01' pattern='[S][0-9]+' autocomplete='off' />

  <span class='input' ></span>
  <input type='text' maxlength='20' required  name='s_name' placeholder='Student Name' autocomplete='off' />

  <span class='input' ></span>
  <input type='number' max='9999999999' onkeydown="javascript: return event.keyCode == 69 ? false :true" required  name='total-att' placeholder='Total-Attendance' autocomplete='off' />

  <span class='input'></span>
  <select name='sem' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
  </select>

  <span class='input'></span>
  <select name='dept' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>Computer</option>
    <option>Electrical</option>
    <option>Mechanical</option>
    <option>Civil</option>
  </select>

  <span class='input'></span>
  <select name='fees_p' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option value='true'>Paid</option>
    <option value='false'>Pending</option>
  </select>

  <br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='js/index.js'></script> <?php } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For Admin ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
     header('Refresh:3; url= ../../index.php ',303,false);
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../../index.php ',303,false);
  }
?> 