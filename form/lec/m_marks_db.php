<!DOCTYPE html>
<html> <!-- le_id, s_id, reason, days, from_date, to_date-->
<head>
  <meta charset='UTF-8'>
  <title>Mid marks Delete (bulk)</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
   <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js' type='text/javascript'></script> -->
  <link rel='stylesheet' href='../temp/css/style.css'>
  <link rel='stylesheet' href='../../disp/disp/css/style_link.css'>
  <link rel='stylesheet' href='style.css'>
</head>
<body> 
  <center style='margin-top: 30px;'></center>
  <?php @session_start(); if(isset($_SESSION['utype'])){ if(@$_SESSION['utype'] == 'lecturer' && @$_SESSION['hod'] == true){ 
        require('../../p/linked_conn.php');
              echo "
                    <form style='width: 60%;' action='../../p/lec/m_marks_db.php' method='POST'><div class='container'>
                    <a  class='nav-item' href='../../index.php'>Go to home</a>
                    <h1 style='margin-top:2%;'>Mid-Sem Marks Submit(bulk)</h1>";
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
                        die("There are no subjects related to this sem and department !<br><br><div class='made-with-love'>
                           <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
                          </div>");
                      }
                    }else{
                      echo "Query failed - mysql error -> ".mysqli_error($conn);
                    } 
                  ?>

  <br><br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../temp/js/index.js'></script> <?php } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For HOD ! <br><br><a class='nav-item' href='../../index.php'>Go to home</a></center>";
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br><a class='nav-item' href='../../index.php'>Go to home</a></center>";
  }
?> 
