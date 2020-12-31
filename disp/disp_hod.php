<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>HOD List</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" href="disp/css/style1.css">
      <link rel="stylesheet" href="disp/css/style_link.css">
<style type="text/css">
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head>
<body>
  <section>
  <center><a href="../index.php" class="nav-item">Go to home page</a></center>
<?php
session_start();

if(isset($_SESSION['utype']) && !empty($_SESSION['utype'])){
    echo "<h1 style='margin:30px'>HOD List</h1>";
    require('../p/linked_conn.php'); //s_id,present?,date,homework

      if(@$_SESSION['utype'] == 'admin'){   
        $query = "select * from HOD Inner join lecturer on lecturer.l_id = HOD.l_id";
      }
      echo"</table>
           
          <div class='tbl-header'>
        <table cellpadding='0' cellspacing='0' border='0'>
          <thead>
            <tr>
              <th>Faculty ID</th><th>Faculty Name</th><th>Department</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class='tbl-content'>
        <table cellpadding='0' cellspacing='0' border='0'>
          <tbody>
      ";
      if(isset($query)){
        if($queryrun = $conn->query($query)){ 
          while ($data = $queryrun->fetch_assoc()){
            echo "<tr><td>".$data['l_id']."</td><td>".$data['l_name']."</td><td>".$data['dept']."</td>";
          }
        }else{
          echo "Mysql error -> ".mysqli_error($conn);
        } 
      }else{
        echo "Query not set !";
      }
}else{
  echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> You Will Be Redirected To Login Page After 3 Seconds.</h1></center>";
  header('Refresh:3; url= ../index.php ',303,false);
}
?>
        </table>
      </tbody>
    </table>
  </div>
</section>
<!-- follow me template -->
<div class="made-with-love">
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
  <script src='jquery.min.js'></script>

    <script src="disp/js/index.js"></script>

</body>
</html>
