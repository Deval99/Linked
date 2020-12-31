<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Delete All Records Of Student</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> 
  <?php 
    @session_start(); 
    if(isset($_SESSION['utype'])){ 
      if($_SESSION['utype'] == 'admin'){ 
      ?>

        <form style='margin-top:20px; margin-bottom:20px;' action='../../p/adm/adm_c_del_rec.php' method='POST'>
            <h1>Delete All Records Of Student</h1><br/>
            <h4><i>*Please Fill Student ID Carefully !</i></h4>
            <h5><i>*You Can Only Delete Records Of Student Whose Admission Is Cancelled !</i></h5>
              <!--s_id,s_name,total-att=0,sem,dept,fees_p,enr_no,password_stu,p_id,p_name,cont_no,pwd_prnt-->
            <span class='input'></span>
            <input type='text' required name='s_id' placeholder='Student ID ex.S01'  pattern='[S][0-9]+' autofocus autocomplete='off' />

            <br><br><br>
            <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
        
        </form>
        <!-- style="margin-left:40px; margin-right:40px;" a_leave,complaints,dailysturec,feedback,midmarks,randomtest,R_COMPlaints,r_leave,semwisesturec-->
        <h4 style="margin-left:500px;">*This Form Will Delete Student Information From,<br>&nbsp;- Ask_leave<br>&nbsp;- Reply_To_Leave<br>&nbsp;- Complaints<br>&nbsp;- Reply_To_Complaints<br>&nbsp;- Daily_Student_Record<br>&nbsp;- Sem_Wise_Student_Record<br>&nbsp;- Feedback<br>&nbsp;- Mid_Marks<br>&nbsp;- Surprise_Test_Marks</h4>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='js/index.js'></script> 

      <?php 
      }else{   
        echo "<center><h1 style='padding: 100px;'> This Page Is Only For Admin ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
        header('Refresh:3; url= ../../index.php ',303,false);
      } 
    }else{
      echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
      header('Refresh:3; url= ../../index.php ',303,false);
    }

  ?> 
</h1>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../disp/disp/js/index.js'></script>

</body>
</html>

