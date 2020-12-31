<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Remove Lecturer</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<style type="text/css">
  input{width: 100%;}
  .input{visibility: hidden;}
</style>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px; width:330px;' action='../../p/adm/re_le.php' method='POST'>
  <h1>Remove Lecturer</h1><br/>
  <h4><i>*Please Fill All Details Carefully !</i></h4>
<!--l_id*, l_name,dept, subj, exp, salary-->
  <span class='input'></span>
  <input type='text' maxlength="10" required id='l_id' placeholder="Lecturer/Professor ID ex.L01" pattern='[L][0-9]+' name='l_id' autofocus autocomplete='off' />

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
