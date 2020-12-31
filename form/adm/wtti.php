<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Add Weekly Time Table</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/wtti.php' method='POST'>
  <h1>Add Weekly Time Table (For 1 Examination)</h1><br/>
  <h4><i>*Please Fill All Details Carefully !</i></h4>
<!--index,sem,monday...,dept,uid-->
<br><h4>Select Department :- </h4>

  <span class='input'></span>
  <select name='dept' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>Computer</option>
    <option>Electrical</option>
    <option>Mechanical</option>
    <option>Civil</option>
  </select>

  <h4>Select Semester :- </h4>

  <span class='input'></span>
  <select name='sem' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
  </select>

  <h4>Select Index :- </h4>

  <span class='input'></span>
  <select name='index' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
  </select>

  <h4>*Max Length = 30<br><br>Monday -> </h4>
  <span class='input' ></span>
  <input type='text' maxlength='30' required  name='monday' placeholder='Monday' autocomplete='off' />
<h4>Tuesday -> </h4>
  <span class='input' ></span>
  <input type='text' maxlength='30' required  name='tuesday' placeholder='Tuesday' autocomplete='off' />
<h4>Wednesday -> </h4>
  <span class='input' ></span>
  <input type='text' maxlength='30' required  name='wednesday' placeholder='Wednesday' autocomplete='off' />
<h4>Thursday -> </h4>
  <span class='input' ></span>
  <input type='text' maxlength='30' required  name='thursday' placeholder='Thursday' autocomplete='off' />
<h4>Friday -> </h4>
  <span class='input' ></span>
  <input type='text' maxlength='30' required  name='friday' placeholder='Friday' autocomplete='off' />
<h4>Saturday -> </h4>
  <span class='input' ></span>
  <input type='text' maxlength='30' required  name='saturday' placeholder='Saturday' autocomplete='off' />  

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
