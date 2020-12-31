<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Mid-Sem Marks Submit</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
</head>
<body> <?php @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'lecturer' && $_SESSION['hod'] == true){ ?>
  <form action='../../p/lec/m_marks_s.php' method='POST'>
  <h1>Mid-Sem Marks Submit</h1><br/>
  <!-- s_id*,subject*,marks*,dept,sem*,date* -->
  <h5>Enter Details Carefully !<br>Pattern for S_ID = S... (S is Capital) ex. S01<br></h5>

  <span class='input'></span>
  <input type='text' maxlength="10" required id='s_id' maxlength="10" name='s_id' placeholder='Student ID ' autofocus autocomplete='off' pattern="[S][0-9]+" />

  <span class='input'></span>
  <input type='text' maxlength="20" required id='subject' name='subject' placeholder='Subject' autofocus autocomplete='off'/>

  </select>

  <span class='input'></span>
  <input type='number' max="30" required id='marks' name='marks' placeholder='Marks' autofocus autocomplete='off' onchange="val()" onkeydown="javascript: return event.keyCode == 69 ? false:true"/>
<script type="text/javascript">
  function val(){
    var marks = document.getElementById('marks').value;
    if(marks > 30 || marks < 0){
      alert('Please Enter Valid Marks ! (0 to 30)');
      document.getElementById('marks').value = 0;
    }
  }
</script>
<h5>Sem :-</h5>
 <span class='input'></span>
  <select  style='width: 70%; margin:5px; padding:5px;' required name='sem' autocomplete='off'>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
  </select>

   <span class='input'></span>
  <input type='date' onchange='val3()' required id='date' name='date' autofocus autocomplete='off'/>

  <script type="text/javascript">
    function val3(){
      var date = document.getElementById('date').value;
      var b41y = new Date();

      var dd = b41y.getDate();
      var mm = b41y.getMonth()+1;
      var yyyy = b41y.getFullYear()-3;
      if(dd < 10){
        dd = '0' + dd;
      }
      if(mm < 10){
        mm = '0' + mm;
      }
      var b41y = yyyy+'-'+mm+'-'+dd;

      yyyy += 3;
      dd -= 1;
      var today = yyyy+'-'+mm+'-'+dd;
      if(date < b41y || date > today){
        alert('Date does not seem right !');
        document.getElementById('date').value = today;
      }
    }
  </script>

  <br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../temp/js/index.js'></script> <?php } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For HOD ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
     header('Refresh:3; url= ../index.php ',303,false);
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../index.php ',303,false);
  }
?> 
<div class="footer-w3l" style="width: 100%;">
  <center><p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p> </center>
</div>
</body>
</html>
