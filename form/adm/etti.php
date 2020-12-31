<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Add Exam Time Table</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/etti.php' method='POST'>
  <h1>Add Exam Time Table (For 1 Examination)</h1><br/>
  <h4><i>*Please Fill All Details Carefully !</i></h4>
<!--uid,subject,dept,time,date-->
  <span class='input'></span>
  <input type='text' maxlength="20" required id='subject' placeholder="Subject Name" name='subject' autofocus autocomplete='off' />

  <br><h4>Select Department :- </h4>

  <span class='input'></span>
  <select name='dept' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>Computer</option>
    <option>Electrical</option>
    <option>Mechanical</option>
    <option>Civil</option>
  </select>

  <span class='input' ></span>
  <input type='number' id="sem" onchange="Sem()" onkeydown="javascript: return event.keyCode == 69 ? false : true"  min='1' max='6' required  name='sem' placeholder='Semester' autocomplete='off' />
  <script type="text/javascript">
    function Sem(){
      var sem = document.getElementById('sem').value;
      if(sem > 6 || sem < 1){
        alert("Diploma have 1 to 6 Semesters !");
        document.getElementById('sem').value = "";
      }
    }
  </script>

  <br><h4>Enter Time :- </h4>
  <span class='input'></span>
  <input type='time' required id='time' onchange="Valid()" name='time' autofocus autocomplete='off' />

  <script type="text/javascript">
  function Valid(){
    var timeValue = document.getElementById('time').value;
    var hr = timeValue.split(':')[0];
    var mn = timeValue.split(':')[1];

    if(hr>15){
      alert("You Only Can Enter Time Less Than 15Hrs");
      document.getElementById('time').value = '00:00';
    }
    if(hr<7){
      alert("You Can Only Enter Time Greater Than 7Hrs");
      document.getElementById('time').value = '00:00';
    }
  }
  </script>

  <span class='input'></span>
  <input type='date' required id='date' onchange="Valid2()" name='date' autofocus autocomplete='off' />

  <script type="text/javascript">
    function Valid2(){
      var form_date = document.getElementById('date');

      var tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1);
      var dd = tomorrow.getDate();
      var mm = tomorrow.getMonth()+1;
      var yyyy = tomorrow.getFullYear();

      if(dd<10){
        dd = '0'+dd;
      }
      if(mm<10){
        mm = '0'+mm;
      }

      var tomorrow = yyyy+'-'+mm+'-'+dd;
      if(document.getElementById('date').value < tomorrow){
        alert("You Can't Enter A Past/Current Date !");
        document.getElementById('date').value = tomorrow;
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
