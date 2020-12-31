<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Add Event2</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> 
  <?php 
    session_start(); 
    if(isset($_SESSION['utype'])){ 
      if($_SESSION['utype'] == 'admin'){ 
      ?>

        <form style='margin-top:20px; margin-bottom:20px;' action='../../p/adm/a_event.php' method='POST'>
            <h1>Add Event</h1><br/>
            <h4><i>*Please Fill All Details Carefully !</i></h4>
              <!--e_id e_name date detail-->
              <br><h5>*For Title/Name, Max Length - 30</h5>
              <h5>*For Details, Max Length - 100</h5>
              <span class='input'></span>
            <input type='text' maxlength='30' required id="e_name" name='e_name' placeholder='Event Name/Title' autofocus autocomplete='off' />

            <span class='input'></span>
            <input type='date' required id="date" onchange="Val()" name='date' placeholder='Date' autofocus autocomplete='off' />
            <script type="text/javascript">
              function Val(){
                var tomorrow = new Date();
                var dd = tomorrow.getDate();
                var mm = tomorrow.getMonth()+1;
                var yyyy = tomorrow.getFullYear();
                dd++;
                if(dd<10){
                  dd = '0'+dd;
                }
                if(mm<10){
                  mm = '0'+mm;
                }

                var tomorrow = yyyy+'-'+mm+'-'+dd;
                
                
                if(document.getElementById('date').value < tomorrow){
                  alert("Date Should Be Greater Than Today");
                  document.getElementById('date').value = tomorrow;
                }
                
              }
            </script>
            
            <span class='input'></span>
            <!-- <textarea cols="30" rows="5" maxlength="100" required id="details" name='details' placeholder='Details' autofocus autocomplete='off' style='resize:none;'>
            </textarea> -->

            <span class='input'></span>
            <input type='text' required id="details" name='details' maxlength="100" placeholder='Details' autofocus autocomplete='off' />
            <br><br><br>
            <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
        
        </form>
        <!-- style="margin-left:40px; margin-right:40px;" a_leave,complaints,dailysturec,feedback,midmarks,randomtest,R_COMPlaints,r_leave,semwisesturec-->
        
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

