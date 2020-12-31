<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Assign subject</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
  <link rel='stylesheet' href='../style_link.css'>
  <style type="text/css">
    input{width:100%;}
    .input{visibility: hidden;}
  </style>
</head>

<body> <?php session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form style='margin-top:20px; margin-bottom:0px; width:330px;' action='../../p/adm/a_sub_l.php' method='POST'>
  <h1>Assign subject to faculty</h1><br/>
  <h4><i>*Please Fill All Details Carefully !</i></h4>
  <h5>If subject is not listed here, please add <a class='nav-item' href='a_sub.php'>here</a></h5>

  <?php 
    require("../../p/linked_conn.php");
    $subj = "select * from subjects Order by sub_name ASC";
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
  <span class='input'></span>
  <input type="text" maxlength="10" name="l_id" placeholder="Lecturer/Professor ID ex.L01" pattern='[L][0-9]+'>
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
