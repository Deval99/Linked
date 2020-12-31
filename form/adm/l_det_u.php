<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Lecturer Details Update</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
  <style type="text/css">
    th,td{padding: 3px;}
  </style>
</head>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/l_det_u.php' method='POST'>
  <h1>Lecturer Details Update</h1><br/>
<br><br> 
<!--//l_id, l_name,dept,subj, exp, salary-->
  
  <span class='input' ></span>
  <input type='text' maxlength='10' required  name='l_id' placeholder='Lecturer ID ex.L01' pattern='[L][0-9]+' autocomplete='off' />

  <span class='input' ></span>
  <input type='text' maxlength='30' required  name='l_name' placeholder='Lecturer Name' autocomplete='off' />

  <span class='input'></span>
  <select name="dept" required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>Computer</option>
    <option>Electrical</option>
    <option>Mechanical</option>
    <option>Civil</option>
  </select>

  <span class='input' ></span>
  <input type='text' maxlength='30' required  name='subj' placeholder='Subjects' autocomplete='off' />

  <span class='input' ></span>
  <input type='number' min="0" max='45' id="exp" onchange="val()" onkeydown="javascript: return event.keyCode == 69 ? false :true" required  name='exp' placeholder='Experience' autocomplete='off' />

  <span class='input' ></span>
  <input type='number' min="0" max='100000' id="salary" onchange="val2()" onkeydown="javascript: return event.keyCode == 69 ? false :true" required  name='salary' placeholder='Salary' autocomplete='off' />

  <script type="text/javascript">
    function val(){
      if(document.getElementById('exp').value > 45 || document.getElementById('exp').value < 0){
        alert("We Only Recruit Professors Who Have Experience 0 to 45");
        document.getElementById('exp').value = 0;
      }
    }
    function val2(){
      if(document.getElementById('salary').value < 0 || document.getElementById('salary').value > 100000){
        alert('We Only Give Salary, 0-Min 100k-Max');
        document.getElementById('salary').value = 0;
      }
    }
  </script>

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