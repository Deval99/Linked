<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Daily Student Record</title>
  <link rel='stylesheet' href='reset.min.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style1.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style_link.css'>
      <!-- <link rel='stylesheet' href='style_link.css'> -->
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head>
<body>
        <section> 
          <center><a href="../../index.php" class="nav-item">Go to home page</a></center><br><br>
<?php
session_start();
if(!empty($_SESSION)){
  if(@$_SESSION['utype'] == 'lecturer'){ 
              require('../../p/linked_conn.php');
              $l_id = $_SESSION['id'];
              $sel = "select * from lecturer where l_id = '$l_id'";
              if($res = $conn->query($sel)){
                $data = $res->fetch_assoc();
                if(!empty($data)){
                  echo "<form action='#' method='POST'><div class='container'><h4>Select current lecture subject --> </h4>";
                  echo "<select id='soflow' style='width:10%; padding:0.4%;' name='subj'><option>".$data['subj']."</option>";
                  echo "<option>".$data['subj2']."</option>";
                  echo "<option>".$data['subj3']."</option>";
                  echo "<option>".$data['subj4']."</option>";
                  echo "<option>".$data['subj5']."</option>";
                  echo "<option>".$data['subj6']."</option></select>";
                  echo "<button class='btn ripple'>Retrieve Students</button></div></form>";
                }else{
                  die("<br><br>Can't fetch data !");
                }
              }else{
                echo "<br><br>Query failed - mysql error -> ".mysqli_error($conn);
              }
            ?>
          
      
          <?php 
            $subj = @$_POST['subj'];
            $dept = $_SESSION['dept'];
            if(!empty($subj)){
              $first = "select * from lecturer inner join subjects on subjects.dept = lecturer.dept where lecturer.l_id = '$l_id' AND subjects.sub_name = '$subj' AND lecturer.dept = '$dept'";
              $query = "select * from student where dept = '$dept'";
              if($res = $conn->query($first)){
                $data = $res->fetch_assoc();
                //Array ( [l_id] => L01 [l_name] => QW [dept] => Computer [subj] => CP [subj2] => ACP [subj3] => DBMS [subj4] => ADBMS [subj5] => JAVA [subj6] => AJAVA [exp] => 5 [salary] => 50000 [sub_id] => 1 [sub_name] => JAVA [sem] => 5 )
                
                $query1 = "select * from student where c_sem = '$data[sem]' AND dept = '$dept'";
                if($res1 = $conn->query($query1)){
                  $res2 =  $conn->query($query1);
                  $data3 = $res2->fetch_assoc();
                  if(!empty($data3)){
                    echo "<center><h4><br><br>Showing students of sem = ".$data3['c_sem'].". and department = ".$data3['dept'].".<br><br></h4></center>";
                    echo "<form action='../../p/lec/dstu_rec_sn.php' method='POST'><table>
                              <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Total Attendance</th>
                                <th>Click if student not present</th>
                                <th>Click if student didn't done work</th>
                              </tr>";
                    
                    while($data2 = $res1->fetch_assoc()){
                      echo "  <tr>
                                <td><h5>".$data2['s_id']."</h5></td>
                                <td><h5>".$data2['s_name']."</h5></td>
                                <td><h5>".$data2['total-att']."</h5></td>
                                <td><input type='checkbox' name='".$data2['s_id']."present' style='width: 30px; height: 30px;' ></td>
                                <td><input type='checkbox' name='".$data2['s_id']."work' style='width: 30px; height: 30px;' ></td>
                              </tr><input type='hidden' name='subj' value='".$subj."'/>";
                              
                    }
                    echo "</table><button class='btn ripple' style='width:98%;'>Submit </button></form>";
                  }else{
                    echo "<center><h2><br><br>There are no students of this sem and department !</h2><br><br></center>";
                  }
                }
              }else{
                echo mysqli_error($conn);
              }
            }else{
              echo "<center><h2><br><br>Please select a subject !<br><br></h2></center>";
            }

              
          ?>
          
<?php

  }else{
    echo "<h1 style='padding-top: 10%;'>Please login as Faculty ! You will be redirected to main page in 5 seconds.</h1>";
    header("Refresh:5; url='../../index.php'",303,false);
  }
}else{
  echo "<h1 style='padding-top: 10%;'>Please login as Faculty ! You will be redirected to main page in 5 seconds.</h1>";
  header("Refresh:5; url='../../index.php'",303,false);
}
?>
<!-- follow me template -->
<div class='made-with-love'>
 <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='disp/js/index.js'></script>
</section>
</body>
</html>