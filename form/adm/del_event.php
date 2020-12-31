<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Delete Event</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
  <style type="text/css">
    th,td{padding: 3px;}
  </style>
</head>
<body> <?php @session_start(); 
if(isset($_SESSION['utype'])){ 
  if($_SESSION['utype'] == 'admin'){ ?>
    <form style='margin-top:20px; margin-bottom:0px;' action='../../p/adm/del_event.php' method='POST'>
    <h1>Delete Event</h1><br/>
    <br><br> <?php require("../../p/linked_conn.php");
    $date = Date('Y-m-d');
    $first = "select * from event where `date` > '$date'";
    if($res1 = $conn->query($first)){
      $res2 = $conn->query($first);
      $chk = $res2->fetch_assoc();
      if(!empty($chk)){ //e_id,e_name,date,detail
        echo "<table border='1' cellpadding='15'><tr><th>ID</th><th>Event Name</th><th>Date</th><th>Details</th></tr>";
        while($data = $res1->fetch_assoc()){
          echo "<tr><td>".$data['e_id']."</td><td>".$data['e_name']."</td><td>".$data['date']."</td><td>".$data['detail']."</td></tr>";
        }
        echo "</table><h4 style='padding-top:25px;'>Enter ID From Above Table -></h4>
        <span class='input'></span>
        <input type='number' onkeydown='javascript: return event.keyCode == 69 ? false : true' min='1' required id='e_id' placeholder='Enter ID Here' name='e_id' autofocus autocomplete='off' />

        <br><br><br>
        <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
        </form>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='js/index.js'></script>";
      }else{
        echo "No Events To Delete ! <br><br><a href='../../index.php'> Go To Main Page </a>";
      }
    }
//<!--uid,subject,dept,time,date-->
  }else{   
    echo "<center><h1 style='padding: 100px;'> This Page Is Only For Admin ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
    header('Refresh:3; url= ../../index.php ',303,false);
  } 
} else{
  echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../../index.php ',303,false);
}
?> 
