<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Daily Student Record Submit</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
</head>
<body onload='fill()'> <?php @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'lecturer'){ ?>
  <form action='../../p/lec/dstu_rec_s.php' method='POST'>
  <h1>Daily Student Record Submit</h1><br/>
  <!-- sid,present?,date,home-work -->
  <h4>Enter Details Carefully !</h4><h6><br> For S_ID - *10 charactors allowed<br> Date is auto-filled with your pc time.<br></h5>

  <span class='input'></span>
  <input type='text' maxlength="10" required id='sid' maxlength="10" name='sid' placeholder='Student ID' autofocus autocomplete='off' />
<h5>If Student Is Present In All Lectures, Please Write 'TRUE'. Else, Write Subject Names In Which Student Was Not Present. *Limit= 50 Charactors</h5>
  <span class='input'></span>
  <input type='text' maxlength="50" required id='present?' name='present?' placeholder='Present?' autofocus autocomplete='off'/>
<h5>If All Work Done, Please Write 'TRUE'. Else, Write Subject Name In Which Work Isn't Done. *Limit= 50 Charactors</h5>
  <span class='input'></span>
  <input type='text' maxlength="50" required id='home_work' name='home_work' placeholder='Work Done?' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='date' required id='date' name='date' placeholder='Date' autofocus autocomplete='off' />

  <script type="text/javascript">
    function fill(){
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear();

      if(dd < 10){
        dd = '0'+dd;
      }
      if(mm < 10){
        mm = '0'+mm;
      }
      var today = yyyy+'-'+mm+'-'+dd;
      document.getElementById('date').value = today;
    }
  </script>

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
