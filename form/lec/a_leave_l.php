<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Ask Leave For Faculty</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> <!-- le_id,l_id,reason*,from_date*,to_date*,granted? -->
  <?php @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'lecturer'){ ?>
  <form action='../../p/lec/a_leave_l.php' method='POST'>
  <h1>Ask Leave For Faculty</h1><br/>
  <h5>Enter Reason, *100 charactors allowed !</h5>
  <span class='input'></span>
  <input type='text' required id='reason' maxlength="100" name='reason' placeholder='Reason' autofocus autocomplete='off' />
  <h3>From :-</h3>
  <span class='input' ></span>
  <input type='date' required id='from' onchange='Validate_from()' name='from' placeholder='From Date' autofocus autocomplete='off' />
  <h3>To :-</h3>
  <span class='input' ></span>
  <input type='date' required  id='to' onchange="Validate_to()" name='to' placeholder='To Date' autofocus autocomplete='off' />
<script type="text/javascript">
function Validate_from(){
  var from = document.getElementById("from").value;
  var to = document.getElementById("reason").value;
  //tomorrow cal
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1;
  var yyyy = today.getFullYear();
  dd++;
  if(dd<10){
    dd = '0'+dd;
  }
  if(mm<10){
    mm = '0'+mm;
  }
  var tomorrow = yyyy+'-'+mm+'-'+dd;
  //cal break
  if(from < tomorrow){
    alert("Please provide a valid 'From' date ! i.e. which is not past/present date");  
    document.getElementById("from").value = tomorrow;
  }
  if(mm == 12){
    var yyyy2 = yyyy + 1;
    var mm2 = "0"+1;
  }else{
    var yyyy2 = yyyy;
    var mm2 = mm + 1;
  }
  var a1m = yyyy2+'-'+mm2+'-'+dd;

  if(from > a1m){
    alert("You can only ask leave within 1 month");
    document.getElementById("from").value = " ";
  }
}
function Validate_to(){

  var from = document.getElementById("from").value;
  var to = document.getElementById("to").value;
  //overmorrow cal
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1;
  var yyyy = today.getFullYear();
  dd = dd+2;
  if(dd<10){
    dd = '0'+dd;
  }
  if(mm<10){
    mm = '0'+mm;
  }
  var overmorrow = yyyy+'-'+mm+'-'+dd;
  //cal break
  if(from >=to){
    alert("Please provide a valid 'To' date ! i.e. which is not 'From' or Past date");
    document.getElementById('to').value = " ";
  }
  if(mm == 12){
    var yyyy2 = yyyy + 1;
    var mm2 = "0"+1;
  }else{
    var yyyy2 = yyyy;
    var mm2 = mm + 1;
  }
  var a1m = yyyy2+'-'+mm2+'-'+dd;

  if(to > a1m){
    alert("You can only ask leave within 1 month");
    document.getElementById("to").value = " ";
  }
}
</script>
  <br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='temp/js/index.js'></script> <?php } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For Faculty ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
     header('Refresh:3; url= ../index.php ',303,false);
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../index.php ',303,false);
  }
?> 
