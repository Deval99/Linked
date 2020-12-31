<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Mid-sem marks Delete</title>
  <!-- https://s.codepen.io/assets/libs/ -->
  <script src='modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
  
  <link rel='stylesheet' href='style.css'>
  <link rel='stylesheet' href='style_link.css'>
</head>
<body>
 
  <?php @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'lecturer' && $_SESSION['hod'] == true){ ?>
  <form action='../../p/lec/m_marks_d.php' method='POST'>
     <center><a href="../../index.php" class="nav-item">Go to home page</a></center> 
  <h1>Mid-sem marks Delete</h1><br/>
  <!-- t_id,l_id,s_id*,subject*,marks*,date -->
  <h5>Enter Details Carefully !<br> S_ID pattern = S.... ('S' is capital) ex. S01<br></h5>

  <span class='input'></span>
  <input type='text' maxlength="10" required id='s_id' maxlength="10" name='s_id' placeholder='Student ID' autofocus autocomplete='off' pattern='[S][0-9]+'/>
<span class='input'></span>
<select required style='width:50%; padding:0.4%; padding-top:5px; padding-bottom:5px; margin-top:10px;' name='sem'>
 <option>1</option>
 <option>2</option>
 <option>3</option>
 <option>4</option>
 <option>5</option>
 <option>6</option>
</select>

<?php
// require('../../p/linked_conn.php');
//               $l_id = $_SESSION['id'];
//               $sel = "select * from lecturer where l_id = '$l_id'";
//               if($res = $conn->query($sel)){
//                 $data = $res->fetch_assoc();
//                 if(!empty($data)){
//                   echo "<h4>Select subject --> </h4>";
//                   echo "<select style='width:50%; padding:0.4%; padding-top:5px; padding-bottom:5px; margin-top:10px;' name='subject'>
//                         <option>".$data['subj']."</option>";
//                   echo "<option>".$data['subj2']."</option>";
//                   echo "<option>".$data['subj3']."</option>";
//                   echo "<option>".$data['subj4']."</option>";
//                   echo "<option>".$data['subj5']."</option>";
//                   echo "<option>".$data['subj6']."</option></select>";    
//                 }else{
//                   die("Can't fetch data !");
//                 }
//               }else{
//                 echo "Query failed - mysql error -> ".mysqli_error($conn);
//               }
            ?>
  <br><br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../temp/js/index.js'></script> <?php } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For Parents ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
     header('Refresh:3; url= ../../index.php ',303,false);
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../../index.php ',303,false);
  }
?> 
