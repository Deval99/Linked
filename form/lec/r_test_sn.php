<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Surprise test marks submit</title>
  <link rel='stylesheet' href='../../disp/disp/css/reset.min.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style1.css'>
      <link rel='stylesheet' href='../../disp/disp/css/style_link.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 5px; padding: 5px;}

</style>
</head>
<body>
        <section> 
          <center><a href="../../index.php" class="nav-item">Go to home page</a><br><br><h3>NOTE:- Please enter Test ID carefully ! <br><br>You can submit Surprise test record for many Test ID in a day BUT can not submit multiple times in 1 test id 1 subject and in 1 day !</h3> </center><br>
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
                  echo "<form action='#' method='POST'><div class='container'><h4>Select subject --> </h4>";
                  echo "<select id='soflow' style='width:10%; padding:0.4%;' name='subj'><option>".$data['subj']."</option>";
                  echo "<option>".$data['subj2']."</option>";
                  echo "<option>".$data['subj3']."</option>";
                  echo "<option>".$data['subj4']."</option>";
                  echo "<option>".$data['subj5']."</option>";
                  echo "<option>".$data['subj6']."</option></select>";
                  echo "<h5>Total marks Max = 100* Min = 10*</h5>
                              <input id='t_marks' onkeydown='javascript: return event.keyCode == 69 ?false:true' required name='t_marks' type='number' max='100' Placeholder='Total Marks' onchange='val2()'); 
                                  }
                                }'> <input type='number' onkeydown='javascript: return event.keyCode == 69 ? false : true' required name='t_id' placeholder='Test ID'>
";
                  echo "<button class='btn ripple'>Retrieve Students</button></div></form>";
                }else{
                  die("Can't fetch data !");
                }
              }else{
                echo "Query failed - mysql error -> ".mysqli_error($conn);
              }
            ?>
          
      
          <?php 
          echo "<br><br>";
            $subj = @$_POST['subj'];
            $t_id = @$_POST['t_id'];
            $t_marks = @$_POST['t_marks'];
            
            $dept = $_SESSION['dept'];
            if(!empty($subj) && !empty($t_id) && !empty($t_marks)){
              
              $chk = "select * from randomtest where l_id = '$l_id' AND t_id = $t_id";
              if($res1 = $conn->query($chk)){
                $res2 = $conn->query($chk);
                $res3 = $res2->fetch_assoc();
                if(!empty($res3)){
                  while($res4 = $res1->fetch_assoc()){
                    if($res4['subject'] != $subj){
                      die("This Test ID is taken by another subject ! Please take another ID");
                    }
                  }
                }
              }else{
                die("Mysql error-> ".mysqli_error($conn)."<br><br><a href='../../index.php' class='nav-item'>Go to main page</a><br><br><a class='nav-item' href='../../form/lec/r_test_sn.php'>Go to form</a><div class='made-with-love'>
                   <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
                  </div>");
              }
              $first = "select * from lecturer inner join subjects on subjects.dept = lecturer.dept where lecturer.l_id = '$l_id' AND subjects.sub_name = '$subj' AND lecturer.dept = '$dept'";
              //$first -- is for retriving students who are related to this lecturer and subject
              //useless-- $query = "select * from student where dept = '$dept'";
              if($res = $conn->query($first)){
                
                $data = $res->fetch_assoc();
                //Array ( [l_id] => L01 [l_name] => QW [dept] => Computer [subj] => CP [subj2] => ACP [subj3] => DBMS [subj4] => ADBMS [subj5] => JAVA [subj6] => AJAVA [exp] => 5 [salary] => 50000 [sub_id] => 1 [sub_name] => JAVA [sem] => 5 ) (in dsturec_sn.php)
                $sem = $data['sem'];
                $query1 = "select * from student where c_sem = '$sem' AND dept = '$dept'";
                if($res1 = $conn->query($query1)){
                  
                  $res2 =  $conn->query($query1);
                  $data3 = $res2->fetch_assoc();
                  if(!empty($data3)){

                    // $t_id_ret = "select max(t_id) as max1 from randomtest";
                    // if($res3 = $conn->query($t_id_ret)){
                    //   $res4 = $res3->fetch_assoc();
                    //   $t_id = $res4['max1'];
                    //   settype($t_id, "integer");
                    //   $t_id += 1;
                    // }else{
                    //   die("Mysql error -> ".mysqli_error($conn)."<br><br> <a href='../../index.php'> Go to main page</a>");
                    // // }
                    // <form action='#' method='GET'>

                    // <center><h4>Showing students of sem = ".$data3['c_sem'].". and department = ".$data3['dept'].".</h4>

                    // <br><br>
                    //             <button class='btn ripple'>Retrieve Students</button></form></center>
                    echo "<form action='../../p/lec/r_test_sn.php' method='POST'>";

                    echo "

                    <div class='tbl-header'>
                      <table cellpadding='0' cellspacing='0' border='0'>
                          <thead>
                              <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Enter marks</th>
                              </tr>
                          </thead>
                      </table>
                    </div>
                    <div class='tbl-content'>
                      <table cellpadding='0' cellspacing='0' border='0'> 
                        <tbody>
                              ";
                              $date = Date('Y-m-d');
                    while($data2 = $res1->fetch_assoc()){
                      $fir = "select * from randomtest where s_id = '".$data2['s_id']."' AND l_id = '$l_id' AND t_id = '$t_id' AND t_marks = '$t_marks'";
                      if($res5 = $conn->query($fir)){
                        $res7 = $conn->query($fir);
                        $data7 = $res7->fetch_assoc();
                        if(empty($data7)){
                          echo "  <tr>
                                <td><h5>".$data2['s_id']."</h5></td>
                                <td><h5>".$data2['s_name']."</h5></td>
                                <td>

                                <input type='hidden' required value='$t_id' name='t_id'>
                                <input type='hidden' required value='$t_marks' name='t_marks'>
                                <input required type='number' onkeydown='javascript: return event.keyCode == 69 ? false : true;' style='width:50%' name='".$data2['s_id']."mark' style='width: 30px; height: 30px;'  id='".$data2['s_id']."mark' onchange='".$data2['s_id']."val3()'></td>
                                <script type='text/javascript'>
                                  function ".$data2['s_id']."val3(){ 
                                    var mark12 = document.getElementById('".$data2['s_id']."mark').value;
                                    var mark2 = document.getElementById('t_marks').value;
                                    var mark1 = parseInt(mark12);
                                    var mark = parseInt(mark2);
                                    if(mark1 > mark || mark1 < 0){
                                      alert('It is greater than Max marks Or less than 0 !');
                                      document.getElementById('".$data2['s_id']."mark').value = 0;
                                    }
                                  } 

                                  /*onfocus='".$data2['s_id']."val6()'

                                  function ".$data2['s_id']."val6(){
                                    var a = document.getElementById('t_marks').value;
                                    if(a == null || a == ''){
                                      alert('Please fill Total_Marks first !');
                                      document.getElementById('t_marks').focus();
                                    }
                                  }*/
                                </script>
                              <input type='hidden' name='subj' value='".$subj."'/>
                              <!-- <input type='hidden' name='t_id' value='".$t_id."'/> -->
                              <input type='hidden' name='sem' value='".$sem."'/></tr>";
                        }else{
                          echo "<tr><td>Surprise test record of ".$data2['s_id']." is already submitted today. If you had another test, then try entering marks tomorrow.</td></tr>";
                        }        
                    }
                  }
                    echo "</tbody></table></div><br><br><button class='btn ripple' style='width:98%;'>Submit </button></form>";
                  }else{
                    echo "<center><h2>".$sem.$dept."There are no students of this sem and department !</h2></center>";
                  }
                }
              }else{
                echo mysqli_error($conn);
              }
            }else{
              echo "<center><h2>Please select a subject !</h2></center>";
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
                              <script type='text/javascript'>
                                function val2(){
                                  var marks = document.getElementById('t_marks').value;
                                  if(marks > 100 || marks < 10){
                                    alert('Please enter marks between 10 and 100 !'); 
                                    
                                    document.getElementById('t_marks').value = "";
                                  }
                                }
                                function isString (value) {
                                  return typeof value === 'string' || value instanceof String;
                                };
                                function isNumber (value) {
                                  return typeof value === 'number' && isFinite(value);
                                };
                              </script>

</section>
</body>
</html>