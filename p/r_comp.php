<!DOCTYPE html>
<html > <!-- cid,sid,lid,date,details     cid,details -->
<head>
  <meta charset='UTF-8'>
  <title>Reply To Complaint</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>

<body>
<center><h1 style="padding-top: 200px;">
  <?php 
session_start();
if(isset($_SESSION['utype'])){
  if($_SESSION['utype'] == 'parent'){ 
    
    $rows = $_SESSION['rows'];
    require('linked_conn.php');
    $cid =  mysqli_real_escape_string($conn, $_POST['cid']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    foreach ($rows as $key) {
      if($key['cid'] == $cid){
        $id = $key['cid'];
      }
    }
      if(isset($id) && isset($details)){
        if( !empty($id) && !empty($details)){
          $date = date('Y-m-d');
          $query3 = "Insert into `r_complaints` (cid,details,date) values('$cid','$details','$date')";
          if($run = $conn->query($query3)){
            $query4 = "update `complaints` SET `r_flag` = 'd' where `cid` = '$cid'";
            if($run2 = $conn->query($query4)){
              echo "You Have Successfully Given Reply To Complaint ! <br><br> Now You Will Be Redirected To Main Page In 10 Seconds.";
              header('Refresh: 10; url= ../index.php',303,false);
            }else{
              echo "update query error";
            }
          }else{
            if(mysqli_error($conn) == "Duplicate entry '$cid' for key 'cid'"){
              echo "Please Don't Refresh It ! <br><br> Now You Will Be Redirected To Main Page In 10 Seconds.";
              header('Refresh: 10; url= ../index.php',303,false);
            }else{
            echo "insert query error".mysqli_error($conn);
            }
          }
        }else{
          echo "Don't Leave It Empty !! <br><br> Now You Will Be Redirected Back To That Page In 10 Seconds.";
          header('Refresh: 10; url= ../form/r_comp.php',303,false);
        }
      }else{
        echo "Please Enter A Valid ID !<br><br> Now You Will Be Redirected To That Page In 10 Seconds.";
      header('Refresh: 10; url= ../form/r_comp.php',303,false);
      }
    
  }else{
    echo "<center><h1 style='padding: 100px;'>This Page Is Only For Parents ! You Will Be Redirected To Main age In 10 Seconds.</h1></center>";
    header('Refresh: 10; url= ../index.php',303,false);
  } 
 } else{
  echo "<center><h1 style='padding: 100px;'>Please Login First ! You Will Be Redirected To Login Page In 10 Seconds.</h1></center>";
  header('Refresh: 10; url= ../index.php',303,false);
}

?>
</h1>
</center>
</body>
</html>