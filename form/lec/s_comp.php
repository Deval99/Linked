<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Submit Complaint About Student</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
</head>
<body> <?php @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'lecturer'){ ?>
  <form action='../../p/lec/s_comp.php' method='POST'>
  <h1>Submit Complaint About Student</h1><br/>
  <!-- cid,sid,lid,date,details,r_flag -->
  <h5>Enter Details Carefully !<br> For S_ID - *10 charactors allowed <br> For Details - *100 charactors allowed<br></h5>

  <span class='input'></span>
  <input type='text' maxlength="10" required id='sid' maxlength="100" name='sid' placeholder='Student ID ex.S01' pattern='[S][0-9]+' autofocus autocomplete='off' />
  
  <span class='input' ></span>
  <input type='text' maxlength="100" required id='details' name='details' placeholder='Details' autofocus autocomplete='off' />
  
  <br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../temp/js/index.js'></script> <?php } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For Parents ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
     header('Refresh:3; url= ../index.php ',303,false);
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../index.php ',303,false);
  }
?> 
