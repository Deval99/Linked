<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Student semwise record submit</title>
  <link rel='stylesheet' href='reset.min.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style1.css'>
      <link rel='stylesheet' href='style_link.css'>
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
  if(@$_SESSION['utype'] == 'lecturer' ){
    if(@$_SESSION['hod'] == true){ 
              require('../../p/linked_conn.php');
              ?><h1 style="margin-top:2%;">Student semwise record submit</h1>
                  <form action='#' method='POST'><div class='container'><h4>Select current semester --> </h4>
                  <select id='soflow' style='width:10%; padding:0.4%;' name='sem'><option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option></select>
                  <button class='btn ripple'>Retrieve Students</button></div></form>
          <?php 
            $sem = @$_POST['sem'];
            $dept = $_SESSION['dept'];
            if(!empty($sem)){
              
               
                $query1 = "select * from student where c_sem = '$sem' AND dept = '$dept'";
                if($res1 = $conn->query($query1)){
                  $res2 =  $conn->query($query1);
                  $data3 = $res2->fetch_assoc();
                  if(!empty($data3)){

                    echo "<center><h4 style='margin: 10px; 0px;'>Showing students of sem = ".$data3['c_sem'].". and department = ".$data3['dept'].".</h4></center>";
                    echo "<form action='../../p/lec/sstu_rec_sb.php' method='POST'><div class='tbl-header'><table  cellpadding='0' cellspacing='0' border='0'><thead>
                              <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>SPI</th>
                                <th>Performance</th> 
                              </tr></thead></table></div><div class='tbl-content'><table  cellpadding='0' cellspacing='0' border='0'><tbody>";
                    
                    while($data2 = $res1->fetch_assoc()){
                      $fir = "select * from semwisesturec where s_id = '".$data2['s_id']."' AND sem = '$sem'";
                      if($res5 = $conn->query($fir)){
                        $res7 = $conn->query($fir);
                        $data7 = $res7->fetch_assoc();
                        if(empty($data7)){
                            echo "  <tr>
                                <td><h5>".$data2['s_id']."</h5></td>

                                <td><h5>".$data2['s_name']."</h5></td>

                                <td><input required type='number' style='padding-left:5px; margin-left:0px; width:30%' id='".$data2['s_id']."spi' onKeyDown='javascript: return event.keyCode == 69?false:true' name='".$data2['s_id']."spi' style='width: 30px; height: 30px;' onchange='".$data2['s_id']."val()' step='any'></td>
                                
                                <td><input required type='text' maxlength='20' style='width:50%' name='".$data2['s_id']."perf' style='width: 30px; height: 30px;' ></td> 
                              </tr> 
                              <script type='text/javascript'>
                                function ".$data2['s_id']."val(){
                                  var spi = document.getElementById('".$data2['s_id']."spi').value;
                                  if(spi > 10.0 || spi < 0.0){
                                    alert('Please enter valid spi !');
                                    document.getElementById('".$data2['s_id']."spi').value = '';
                                  }
                                }
                              </script> 
                              ";
                        }else{
                          echo "<tr><td>".$data2['s_id']."</td><td>Already submitted !</td></tr>";
                        }
                      }else{
                       echo "<br><br><center>Can't fetch data from Semwise Student Record !</center>";
                      }
                    }

                    echo "</tbody></table></div><input type='hidden' name='sem' value='".$sem."'><br><br><button class='btn ripple' style='width:98%;'>Submit </button></form>";
                  }else{
                    echo "<center><h2 style='margin: 10px; 0px;'>There are no students of this sem and department !</h2></center>";
                  }
                }
             
            }else{
              echo "<center><h2><br><br>Please select Sem !</h2></center>";
            }

              
          ?>
          <!-- <script type='text/javascript'>
                                function val(){
                                  var spi = document.getElementById('spi').value;
                                  if(spi > 10.0 || spi < 0.0){
                                    alert('Please enter valid spi !');
                                    document.getElementById('spi').value = '';
                                  }
                                }
                              </script>    -->
<?php
    }else{
      echo "<h1 style='padding-top: 10%;'>Please login as Faculty(HOD) ! You will be redirected to main page in 5 seconds.</h1>";
      header("Refresh:5; url='../../index.php'",303,false);
    }
  }else{
    echo "<h1 style='padding-top: 10%;'>Please login as Faculty(HOD) ! You will be redirected to main page in 5 seconds.</h1>";
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