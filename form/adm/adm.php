<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Admission</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/adm.php' method='POST'>
  <h1>Admission</h1><br/>
  <h4><i>*Please Fill All Details Carefully !</i></h4>
<!--s_id,s_name,total-att=0,sem,dept,fees_p,enr_no,password_stu,p_id,p_name,cont_no,pwd_prnt-->
  <span class='input'></span>
  <input type='text' required maxlength="10" pattern='[S][0-9]+' name='s_id' placeholder='Student ID ex.S01' autofocus autocomplete='off' />
  
  <span class='input' ></span>
  <input type='text' required maxlength="20" name='s_name' placeholder='Student Name' autocomplete='off' />
  
  <span class='input' ></span>
  <input type='number' id="sem" onchange="Sem()" onkeydown="javascript: return event.keyCode == 69 ? false : true"  min='1' max='6' required  name='sem' placeholder='Semester' autocomplete='off' />
<script type="text/javascript">
function Sem(){
  var sem = document.getElementById('sem').value;
  if(sem > 6 || sem < 1 ){
    alert("Diploma have 1 to 6 Semesters !");
    document.getElementById('sem').value = "";
  }
}
</script>
  <h3>Department :-</h3>
  <span class='input' ></span>
  <select name='dept' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option>Computer</option>
    <option>Electrical</option>
    <option>Mechanical</option>
    <option>Civil</option>
  </select>

  <h3>Fees Paid ? :-</h3>
  <span class='input' ></span>
  <select name='fees_p' required style='width:250px; padding:5px; margin-bottom:30px;'>
    <option value="true">Yes</option>
    <option value="false">Pending</option>
  </select>

  <span class='input' ></span>
  <input type='number' min='1' max='999999999999' onchange="Validate2()" required onkeydown="javascript: return event.keyCode == 69?false:true" name='enr_no' id='enr_no' placeholder='Enrollment Number' autocomplete='off' />
<script type="text/javascript">
function Validate2(){
  var enr_no = document.getElementById('enr_no').value;
  if(enr_no > 999999999999){
    alert("Enrollment Number doesn't seem right !");
  }
}
</script>
  <span class='input' ></span>
  <input  type='password' required  id='pwd_stu' name='pwd_stu' placeholder='Student Login Password' autocomplete='off' />

  <span class='input' ></span>
  <input  type='password' onchange="Stu_Validate()" required  id='conf_pwd_stu' name='conf_pwd_stu' placeholder='Confirm Student Password' autocomplete='off' />
<script type="text/javascript">
  var pwd = document.getElementById('pwd_stu');
  var conf_pwd = document.getElementById('conf_pwd_stu');
  function Stu_Validate(){
    if(pwd.value != conf_pwd.value){
      alert('Student Passwords Don\'t Match');
      pwd.value = "";
      conf_pwd.value = "";
    }
  }
</script>
  
  <span class='input' ></span>
  <input type='text' required pattern='[P][0-9]+' maxlength="10" name='p_id' placeholder='Parents ID ex.P01' autocomplete='off' />

  <span class='input' ></span>
  <input type='text' required maxlength="20" name='p_name' placeholder='Parent Name' autocomplete='off' />

  <span class='input' ></span>
  <input type='number' id="cont_no" required onchange="Validate1()" onkeydown="javascript: return event.keyCode == 69? false: true" name='cont_no' placeholder='Parent Contact Number' autocomplete='off' />
<script type="text/javascript">
function Validate1(){
  var cont_no = document.getElementById('cont_no').value;
  if(cont_no > 9999999999 || cont_no <= 999999999){
    alert("Contect Number doesn't seem right !");
    document.getElementById('cont_no').value = 0;
  }
}
</script>
  <span class='input' ></span>
  <input type='password' required  id="pwd_prt" name='pwd_prt' placeholder='Parent Login Password' autocomplete='off' />

  <span class='input' ></span>
  <input type='password' required  onchange='Prt_Validate()' id="conf_pwd_prt" name='conf_pwd_prt' placeholder='Confirm Parent Password' autocomplete='off' />
  <script type="text/javascript">
    var pwd2 = document.getElementById('pwd_prt');
    var conf_pwd2 = document.getElementById('conf_pwd_prt');

    function Prt_Validate(){
      if(pwd2.value != conf_pwd2.value){
        alert("Parent Password Don\'t Match !");
        pwd2.value = "";
        conf_pwd2.value = "";
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
