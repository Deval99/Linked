<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Mid-Sem Marks Submit(bulk)</title>
  <link rel='stylesheet' href='reset.min.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style1.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style_link.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 5px; padding: 5px;}
th{font-size: 125%;}
td{font-size: 100%;}
</style>
</head>
<body>
        <section> 
          <center><a href="../../index.php" class="nav-item">Go to home page</a></center>
          
<?php
session_start();
if(!empty($_SESSION)){
  if(@$_SESSION['utype'] == 'lecturer' && $_SESSION['hod'] == true){
   
              require('../../p/linked_conn.php');
              echo "<h1 style='margin-top:2%;'>Mid-Sem Marks Submit(bulk)</h1>
                    <form action='#' method='POST'><div class='container'>";
                    require('../../p/linked_conn.php');
                    $l_id = $_SESSION['id'];
                    $dept = $_SESSION['dept'];
                    $sel = "select * from subjects where dept = '$dept' ORDER BY sem ASC";
                    if($res = $conn->query($sel)){
                      $data = $res->fetch_assoc();
                      if(!empty($data)){
                        echo "<h4 style='padding-right: 5px;'>Select subject --> </h4>";
                        echo "<select style='width:50%; padding:0.4%; padding-top:5px; padding-bottom:5px; margin-top:10px;' name='sub_name'>";
                        $res1 = $conn->query($sel);
                        while($data2 = $res1->fetch_assoc()){
                          echo "<option value='".$data2['sub_name']."'>".$data2['sub_name']." (Sem ".$data2['sem'].")</option>";
                        }
                        echo "</select>";    
                      }else{
                        die("<br><br>There are no subjects related to this sem and department !<br><br><div class='made-with-love'>
                           <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
                          </div>");
                      }
                    }else{
                      echo "<br><br>Query failed - mysql error -> ".mysqli_error($conn);
                    } 
                  echo"
                  <button class='btn ripple'>Retrieve Students</button></div></form>
          ";
             
          //--------------------------------------------------------
            if(@$_POST == NULL){
              die("<br><br><div class='made-with-love'>
                           <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
                          </div>");
            }else{
              //print_r($_POST);
            }

            $sub_name = @$_POST['sub_name'];
            $q3 = "select * from subjects where sub_name = '$sub_name'";
            if($res6 = $conn->query($q3)){
              $res7 = $res6->fetch_assoc();
              if(!empty($res7)){
                $sem = (int)$res7['sem'];
              }
            }else{
              echo "Mysqli error -> ".mysqli_error($conn);
            }
            $dept = $_SESSION['dept'];
            $q1 = "select * from student where c_sem = $sem AND dept = '$dept'";
            if(!($res2 = $conn->query($q1))){
                die("<br><br>Query failed ! ".mysqli_error($conn)." <br><br><div class='made-with-love'>
                           <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
                          </div>");
            }
             $res3 = $conn->query($q1);
            $data3 = $res3->fetch_assoc();
             if(empty($data3)){
              die("<center><h3 style='margin-top: 10px;'> There are no students in this sem and department ! </h3></center> <br><br><div class='made-with-love'>
                           <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
                          </div>");
            }
            
            echo "<center><h4 style='margin-top: 5px; margin-bottom: 5px;'><br><br>Showing students of sem = ".$sem.". and department = ".$dept.". To submit marks of ".$sub_name."</h4></center>";
            echo "<form action='../../p/lec/m_marks_sb.php' method='POST'><div class='tbl-header'><table  cellpadding='0' cellspacing='0' border='0'><thead>
               <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Marks</th>                
               </tr></thead></table></div><div class='tbl-content'><table  cellpadding='0' cellspacing='0' border='0'><tbody>";
            
            
           

           
            while($data2 = $res2->fetch_assoc()){
              $fir = "select * from midmarks where s_id = '".$data2['s_id']."' AND sem = '$sem' AND subject = '$sub_name'";
              if($res5 = $conn->query($fir)){
                $res7 = $conn->query($fir);
                $data7 = $res7->fetch_assoc();
                if(empty($data7)){
                  echo "
                      <tr>
                        <td><h5>".$data2['s_id']."</h5></td>
                        <td><h5>".$data2['s_name']."</h5></td>
                        <td><input type='number' onkeydown='javascript: return event.keyCode == 69 ? false : true' name='".$data2['s_id']."mark' id='".$data2['s_id']."mark' onchange='".$data2['s_id']."val()'></td>
                            <script type='text/javascript'>
                              function ".$data2['s_id']."val(){
                                var mark = document.getElementById('".$data2['s_id']."mark').value;
                                if(mark > 30 || mark < 0){
                                  alert('Please enter valid marks !');
                                  document.getElementById('".$data2['s_id']."mark').value = 0;
                                }
                              }
                            </script> 
                      </tr>";
                }else{
                  echo "<tr><td>".$data2['s_id']."</td><td>Already submitted !</td></tr>";
                }
              }else{
                echo "<br><br><center>Can't fetch data from Semwise Student Record !</center>";
              }
            }
            echo "</tbody></table></div><input type='hidden' name='sem' value='".$sem."'><input type='hidden' name='sub_name' value='".$sub_name."'><br><br><button class='btn ripple' style='width:98%;'>Submit </button></form>";                
  }else{
    echo "<h1 style='padding-top: 10%;'>Please login as Faculty ! You will be redirected to main page in 5 seconds.</h1>";
    header("Refresh:5; url='../../index.php'",303,false);
  }
}else{
  echo "<h1 style='padding-top: 10%;'>Please login ! You will be redirected to main page in 5 seconds.</h1>";
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