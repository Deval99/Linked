<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Recruit Lecturer</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<style type="text/css">
  input{width: 100%;}
  .input{visibility: hidden;}
</style>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px; width: 330px;' action='../../p/adm/r_le.php' method='POST'>
  <h1>Recruit Lecturer</h1><br/>
  <h4><i>*Please Fill All Details Carefully !</i></h4>
<!--l_id, l_name,dept, subj, exp, salary-->
  <span class='input'></span>
  <input type='text' maxlength="10" required id='l_id' placeholder="Lecturer/Professor ID ex.L01" pattern='[L][0-9]+' name='l_id' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='text' maxlength="30" required id='l_name' placeholder="Lecturer/Professor Name" name='l_name' autofocus autocomplete='off' />

  <span class='input'></span>
  <select name="dept" required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>Computer</option>
    <option>Electrical</option>
    <option>Mechanical</option>
    <option>Civil</option>
  </select>
<h4>Subjects :-</h4>
<h5>Write atleast 1 subject</h5>
  <span class='input'></span>
  <input type='text' maxlength="30" required id='subj' placeholder="Subject 1" name='subj' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='text' maxlength="30" id='subj2' placeholder="Subject 2" name='subj2' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='text' maxlength="30" id='subj3' placeholder="Subject 3" name='subj3' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='text' maxlength="30" id='subj4' placeholder="Subject 4" name='subj4' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='text' maxlength="30" id='subj5' placeholder="Subject 5" name='subj5' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='text' maxlength="30" id='subj6' placeholder="Subject 6" name='subj6' autofocus autocomplete='off' />

  <span class='input'></span>
  <input type='number' onkeydown="javascript: return event.keyCode == 69 ? false : true" min='0' max='45' required id='exp' placeholder="Experience" name='exp' autofocus autocomplete='off' onchange="val()"/>

  <script type="text/javascript">
  function val(){
    if(document.getElementById('exp').value > 45 || document.getElementById('exp').value < 0){
      alert("We Only Recruit Professors Who Have Experience 0 to 45");
      document.getElementById('exp').value = 0;
    }
  }
  </script>

  <span class='input'></span>
  <input type='number' onkeydown="javascript: return event.keyCode == 69 ? false : true" required id='salary' placeholder="Salary" onchange="val2()" name='salary' autofocus autocomplete='off' />

  <script type="text/javascript">
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
