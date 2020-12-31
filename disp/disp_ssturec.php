<!DOCTYPE html>
<html>
<head>
      <meta charset='UTF-8'>
      <title>Semwise Student Record</title>
      
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="disp/css/reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" href="disp/css/style1.css">
  
</head>
<body>

<section>
<center><a href='../index.php' class='nav-item'>Go to home page</a></center>

<?php
session_start();
require('../p/linked_conn.php'); //s_id,present?,date,homework
if (isset($_SESSION['utype']) && !empty($_SESSION['utype'])) {
  echo "<h1 style='padding-top:30px;'>Semwise Student Record</h1>";
    if(@$_SESSION['utype'] == 'student'){  
      $id = $_SESSION['id'];
      $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where semwisesturec.s_id = '$id' ORDER BY semwisesturec.`sem`";
    }

    if (@$_SESSION['utype'] == 'parent') {
      $id = $_SESSION['id'];
      $p_sid = $_SESSION['p_sid'];
      $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where semwisesturec.s_id = '$p_sid' ORDER BY semwisesturec.`sem`";
    }

    if(@$_SESSION['utype'] == 'admin'){  
      echo "<br><center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i></center><center><div class='sort' style='margin:20px;'>
      <div class='container'>
      <form action='#'method='POST'>
      <h4 style='padding-right:12%;'>Select Column: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4><br>
            <select name='col' id='soflow'>
              <option value='dept'>Department (e.x. Computer)</option>
              <option value='sem'>Semester (e.x. 1)</option>
              <option value='s_id'>Student ID (e.x. S01)</option>
              <option value='spi'>SPI (Default DESC, write ASC to sort in ascending) &nbsp;;&nbsp;;&nbsp;;&nbsp;;&nbsp;;</option>
            </select>
          <input name='value' type='text' placeholder='Value'></input>
          <button type='submit' class='btn ripple'>Sort</button>
          </form></div></div></center>";

            $col = mysqli_real_escape_string($conn, @$_POST['col']);
            $value = mysqli_real_escape_string($conn, @$_POST['value']);
            if(!empty($col)){
              if($col == 'dept'){
                if(!empty($value)){
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where dept = '$value' ORDER BY dept, semwisesturec.`sem` DESC";
                }else{
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id ORDER BY dept, semwisesturec.`sem` DESC";
                }
              }else if($col == 'sem'){
                if(!empty($value)){
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where sem = $value ORDER BY dept, semwisesturec.`sem` DESC";
                }else{
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id ORDER BY dept, semwisesturec.`sem` DESC";
                }
              }else if($col == 's_id'){
                if(!empty($value)){
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where semwisesturec.s_id = '$value' ORDER BY dept, semwisesturec.`sem` DESC";
                }else{
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id ORDER BY dept, semwisesturec.`s_id` ASC, semwisesturec.`sem` DESC";
                }
              }else if($col == 'spi'){
                if($value == 'ASC' || $value == 'asc'){
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id ORDER BY dept, semwisesturec.`sem` DESC, semwisesturec.`spi` ASC";
                }else{
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id ORDER BY dept, semwisesturec.`sem` DESC, semwisesturec.`spi` DESC";
                }
              }
            }else{
              $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id ORDER BY dept, `semwisesturec`.`sem`, semwisesturec.s_id ASC";
            }
    }
    if(@$_SESSION['utype'] == 'lecturer'){  
      echo "<br><center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i><div class='sort' style='margin:20px;'>
          <div class='container'>
          <form action='#'method='POST'>
          <h4 style='padding-right:31%;'>Select Column: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4><br>
            <select name='col' id='soflow'>
              <option value='sem'>Semester</option>
              <option value='s_id'>Student ID</option>
              <option value='spi'>SPI (Descending) &nbsp; &nbsp; &nbsp; &nbsp;</option>
            </select>
          <input name='value' type='text' placeholder='Value'></input>
          <button type='submit' class='btn ripple'>Sort</button>
          </form></div></div></center>";
            $col = mysqli_real_escape_string($conn, @$_POST['col']);
            $value = mysqli_real_escape_string($conn, @$_POST['value']);
            $dept = $_SESSION['dept'];
            if(!empty($col)){
              if($col == 'sem'){
                if(!empty($value)){
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where `semwisesturec`.`sem` = '$value' AND student.dept = '$dept'";
                }else{
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where student.dept = '$dept' ORDER BY semwisesturec.`sem` DESC";
                }
              }else if($col == 's_id'){
                if(!empty($value)){
                  //echo "not empty";
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where `semwisesturec`.`s_id` = '$value' AND student.dept = '$dept' ORDER BY semwisesturec.`sem`";
                }else{
                  //echo "empty";
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where student.dept = '$dept' ORDER BY semwisesturec.`sem` DESC,semwisesturec.s_id ASC";
                }
              }else if($col == 'spi'){
                if($value == 'asc' || $value == 'ASC'){
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where student.dept = '$dept' ORDER BY semwisesturec.`sem` DESC, semwisesturec.`spi` ASC";
                }else{
                  $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where student.dept = '$dept' ORDER BY semwisesturec.`sem` DESC, semwisesturec.`spi` DESC";
                }
              }
            }else{
              $query="select * from semwisesturec INNER JOIN student ON student.s_id = semwisesturec.s_id where student.`dept` = '$dept' ORDER BY `semwisesturec`.`sem` DESC, `semwisesturec`.`s_id`";
            }
    }
    echo "
      
      
      <div class='tbl-header'>
        <table cellpadding='0' cellspacing='0' border='0'>
          <thead>
            <tr>
              <th>S ID</th><th>Sem</th><th>Total Attandance</th><th>SPI</th><th>Performance In Each Semester</th><th>Department</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class='tbl-content'>
        <table cellpadding='0' cellspacing='0' border='0'>
          <tbody>
            ";

            if($queryrun = $conn->query($query)){ 
                while ($data = $queryrun->fetch_assoc()){
                  echo '<tr><td>'.$data['s_id'].'</td><td>'.$data['sem'].'</td><td>'.$data['total-attend'].'</td><td>'.$data['spi'].'</td><td>'.$data['performance-status'].'</td><td>'.$data['dept'].'</td></tr>';
                  //print_r($data);
                }
              }else{
                echo mysqli_error($conn);
                echo $query;
              } echo " </table>
      </tbody>
    </table>
  </div>
</section>
"; 
} else{
  echo "<h1 style='margin:30px'>Please Login !!</h1>";
}
echo "
	

<!-- follow me template -->
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='disp/js/index.js'></script>

</body>
</html>
";
?>