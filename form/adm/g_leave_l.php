<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Grant Leave For Faculty</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
  <style type="text/css">
    td{padding: 10px;}
  </style>
</head>
<body> <?php require('../../p/linked_conn.php'); @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'admin'){ ?>
  <form action='../../p/adm/g_leave_l.php' method='POST'>
  <h1>Grant Leave For Faculty</h1><br/>
  <!-- le_id, s_id, l_id,reason, days, from_date, to_date--><?php 
  //$le_id = mysql_real_escape_string($conn, $_POST['le_id']);
  $date = date('Y-m-d');

  $query1 = "select * from `a_leave_l` where `granted?` = 0 AND `from_date` > '$date'";
    if($res = $conn->query($query1)){
      $res2 = $conn->query($query1);
      $data2 = $res2->fetch_assoc();
      if(!empty($data2)){
        echo"<br><h4>Dates Are In 'yyyy-mm-dd' Format</h4><br><table border='1'><tr>
          <th>Leave ID</th><th>Faculty ID</th><th>Reason</th><th>From Date</th><th>To Date</th>
            </tr>";
        while($data = $res->fetch_assoc()){
          echo "<tr><td>".$data['le_id']."</td><td>".$data['l_id']."</td><td>".$data['reason']."</td><td>".$data['from_date']."</td><td>".$data['to_date']."</td></tr>";
        }
        echo "</table> <br><br>
          <h5>Enter Leave ID Carefully !<br> Please Enter Leave ID From Above In Below TextBox</h5>

          <span class='input'></span>
          <input type='text' maxlength='10' required id='le_id' maxlength='10' name='le_id' placeholder='Leave ID' autofocus autocomplete='off' />
          
          <br><br><br>
          <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
          </form>
          <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src='../temp/js/index.js'></script>"; 
      }else{
        echo "There are no leave requests to grant !";
      }

    }
  } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For Parents ! <br><br> You Will Be Redirected To Main Page After 3 Seconds.</h1></center>";
     header('Refresh:3; url= ../index.php ',303,false);
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../index.php ',303,false);
  }
?> 
