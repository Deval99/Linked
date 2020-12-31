<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Send Notice</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/s_notice.php' method='POST'>
  <h1>Send Notice</h1><br/>
  <h4><i>*Please Fill Student ID Carefully !</i></h4>
<!--n_id, title,date,details-->
  <br><h5>*For Title, Max Length - 20</h5>
  <h5>*For Details, Max Length - 100</h5>

  <span class='input'></span>
  <input type='text' maxlength="20" required  placeholder="Title" name='title' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='text' maxlength="100" required placeholder="Details" name='details' autofocus autocomplete='off' />

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
