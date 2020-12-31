<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Remove subject completely</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/r_sub.php' method='POST'>
  <h1>Remove subject completely</h1><br/>
  <h4><i>*Please Fill All Details Carefully !</i></h4>

  <?php 
    require("../../p/linked_conn.php");
    $subj = "select * from subjects";
    if($res1 = $conn->query($subj)){
      echo "
      <span class='input'></span>
      <select name='sub_name' required style='width:250px; padding:5px; margin-bottom:30px;'>";
        while($data = $res1->fetch_assoc()){
          echo "<option>".$data['sub_name']."</option>";
        }
      echo "</select>";
    }
  ?>
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
