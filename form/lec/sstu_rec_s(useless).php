<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Semwise Student Record Submit</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
</head>
<body> <?php 
die(header("Refresh:0; url='../../index.php'",303,false));

@session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'lecturer'){ ?>
  <form action='../../p/lec/sstu_rec_s.php' method='POST'>
  <h1>Semwise Student Record Submit</h1><br/>
  <!-- sid,sem,total-attend,spi,performance-status -->
  <h5>Enter Details Carefully !<br> For S_ID - *10 charactors allowed <br> For Details - *100 charactors allowed<br></h5>

  <span class='input'></span>
  <input type='text' maxlength="10" required id='sid' maxlength="100" name='sid' placeholder='Student ID' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='number' max="10" onkeydown="javascript: return event.keyCode == 69? false:true" required id='spi' name='spi' placeholder='SPI' onchange="val()" autofocus autocomplete='off' step="any" />

  <script type="text/javascript">
    function val(){
      var spi = document.getElementById('spi').value;
      if(spi > 10 || spi < 0){
        alert("Please Enter Valid SPI !");
        document.getElementById('spi').value = 0;
      }
    }
  </script>
  
  <span class='input'></span>
  <input type='text' maxlength="20" required id='performance-status' name='performance-status' placeholder='Performance(Good/Poor)' autofocus autocomplete='off' />

  <br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../temp/js/index.js'></script> <?php } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For Faculty ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
     header('Refresh:3; url= ../../index.php ',303,false);
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../../index.php ',303,false);
  }
?> 
