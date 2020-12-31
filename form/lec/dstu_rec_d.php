<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Delete Daily Student Record</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
</head>
<body> <?php @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'lecturer'){ ?>
  <form action='../../p/lec/dstu_rec_d.php' method='POST'>
  <h1>Delete Daily Student Record</h1><br/>
  <!-- sid,date -->
  <h5>Enter Details Carefully !<br> For S_ID - *10 charactors allowed<br></h5>

  <span class='input'></span>
  <input type='text' maxlength="10" required id='sid' maxlength="10" name='sid' placeholder='Student ID' autofocus autocomplete='off' />

<span class='input' ></span>
  <input type='date' required id='date' onchange="valid()" name='date' placeholder='From Date' autofocus autocomplete='off' />

  <script type="text/javascript">
    function valid(){
      var date = document.getElementById('date').value;
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear();

      if(mm < 10){
        mm = '0'+mm;
      }
      if(dd < 10){
        dd = '0'+dd;
      }

      var today = yyyy+'-'+mm+'-'+dd;
      
      if(date > today){
        alert('There will be not any record with future date ! (if you are trying to enter past date and still receiving this message, please check Your PC date !)');
        document.getElementById('date').value = today;
      }
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
