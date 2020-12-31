<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Parents Details Update</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
  <style type="text/css">
    th,td{padding: 3px;}
  </style>
</head>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/p_det_u.php' method='POST'>
  <h1>Parents Details Update</h1><br/>
<br><br> 
<!--//p_id, p_name, s_id, cont_no-->
  
  <span class='input' ></span>
  <input type='text' maxlength='10' required  name='p_id' placeholder='Parents ID' autocomplete='off' />

  <span class='input' ></span>
  <input type='text' maxlength='20' required  name='p_name' placeholder='Parents Name' autocomplete='off' />

  <span class='input' ></span>
  <input type='number' max='9999999999' onkeydown="javascript: return event.keyCode == 69 ? false :true" required  name='cont_no' placeholder='Contact Number' autocomplete='off' />

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