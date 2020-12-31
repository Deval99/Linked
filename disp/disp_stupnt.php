<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Student &amp; Parent Details</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="disp/css/reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" type="text/css" href="disp/css/style1.css">
   
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
require('../p/linked_conn.php'); //s_id,present?,date,homework
 if (isset($_SESSION['utype'])) {
      echo "<h1 style='padding-top:30px;'>Student And Parents Details</h1><br>";
      if($_SESSION['utype'] == 'admin' || $_SESSION['utype'] == 'lecturer'){
        echo "<center><i>*To See All Records Leave 'Column' as 'Select' and Leave 'value' Blank</i></center>";
      }
    } else{
      echo "<h1>Please Login !!</h1>";
    }


if($_SESSION['utype'] == 'student'){
    $id = $_SESSION['id'];
    $query="select * from student inner join parents on student.p_id = parents.p_id where s_id = '$id'";
}

if ($_SESSION['utype'] == 'parent') {
  $id = $_SESSION['id'];
    $query="select * from parents inner join student on parents.p_id = student.p_id where parents.p_id = '$id'";
}


if ($_SESSION['utype'] == 'admin') {
  echo "<div class='sort'>
<div class='container'>
  <form action='disp_stupnt.php' method='POST'>
<h4 style='padding-right:21%;'>Select Column:  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter Value: </h4>
<select name='col' id='soflow'>
  <option value='Def'>Select</option>
  <option value='s_id'>Student ID (ex. S01)</option>
  <option value='s_name'>Student Name</option>
  <option value='fees_p'>Fees Paid(default false, enter 'true' to retrieve whose fees are paid)</option>
  <option value='sem'>Semester (Enter 1 to 6)</option>
  <option value='dept'>Department (ex. Computer)</option>
  <option value='att'>Attandance (ASC or DESC)(DESC is Default)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
  <option value='p_id'>Parents ID</option>
  <option value='p_name'>Parents Name</option>
</select>
  
<input name='value' type='textbox' placeholder='Value (Case Insensitive)'></input>
<!--input type='submit' value='Sort'></input-->

<button type='submit' class='btn ripple'>Sort</button>
</div>
</form></div><br><br>";
  $col = mysqli_real_escape_string($conn, @$_POST['col']);
  $value = mysqli_real_escape_string($conn, @$_POST['value']);
  if(!empty($col)){
    if($col == 'Def'){
       $query="select * from student inner join parents on parents.p_id = student.p_id ORDER BY dept";
    }else if($col == 's_id' ||$col == 's_name' || $col == 'p_id' || $col == 'p_name'){
      if(!empty($value)){
        if($col == 'p_id' || $col == 'p_name'){
          $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where parents.$col = '$value'";
        }else{
          $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.$col = '$value'";
        }
      }else{
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id ORDER BY s_id";
      }
    }else if($col == 'fees_p'){
      if($value == 'true'){
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where fees_p = 'true' ORDER BY dept, s_id ASC";
      }else{
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where fees_p = 'false' ORDER BY dept, s_id ASC";
      }
    }else if($col == 'sem'){
      if(!empty($value)){
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where c_sem = '$value' ORDER BY dept";
      }else{
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id ORDER BY c_sem DESC, s_id ASC";
      }
    }else if($col == 'dept'){
      if(!empty($value)){
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.`dept` = '$value' ORDER BY c_sem DESC, s_id ASC";
      }else{
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id ORDER BY dept, s_id ASC";
      }
    }else if($col == 'att'){
      echo "*student records are sorted and grouped in department and sem, the first row you will see is student who have highest or lowest attendance in his/her department and sem.";
      if($value == 'ASC' || $value == 'asc'){
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id ORDER BY dept, c_sem DESC, `total-att` ASC";
      }else{
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id ORDER BY dept, c_sem DESC, `total-att` DESC";
      }
    }else{
      $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id";
    }
  }else{
    $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id";
  }
}
if ($_SESSION['utype'] == 'lecturer') {
  echo "<div class='sort'><div class='container'><form action='disp_stupnt.php'method='POST'>
  <h4 style='padding-right:21%;'>Select Column:  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter Value: </h4>
  <select name='col' id='soflow'>
    <option value='Def'>Select</option>
    <option value='s_id'>Student ID (ex. S01)</option>
    <option value='s_name'>Student Name</option>
    <option value='fees_p'>Fees Paid(true or false)</option>
    <option value='sem'>Semester (Enter 1 to 6)</option>
    <option value='att'>Attandance (ASC or DESC)(DESC is Default) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
    <option value='p_id'>Parents ID</option>
    <option value='p_name'>Parents Name</option>
  </select>
  

<input name='value' type='text' placeholder='Value'></input>
<button type='submit' class='btn ripple'>Sort</button>
</form></div></div><br><br>";
  $col = mysqli_real_escape_string($conn, @$_POST['col']);
  $value = mysqli_real_escape_string($conn, @$_POST['value']);
  $dept = @$_SESSION['dept'];

  if(!empty($col)){
    if($col == 'Def'){
       $query="select * from student inner join parents on parents.p_id = student.p_id where student.dept = '$dept' ORDER BY dept";
    }else if($col == 's_id' ||$col == 's_name' || $col == 'p_id' || $col == 'p_name'){
      if(!empty($value)){
        if($col == 'p_id' || $col == 'p_name'){
          $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where parents.$col = '$value' AND student.dept = '$dept'";
        }else{
          $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.$col = '$value' AND student.dept = '$dept'";
        }
      }else{
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.dept = '$dept' ORDER BY s_id";
      }
    }else if($col == 'fees_p'){
      if($value == 'true'){
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where fees_p = 'true' AND student.dept = '$dept' ORDER BY dept, s_id ASC";
      }else{
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where fees_p = 'false' AND student.dept = '$dept' ORDER BY dept, s_id ASC";
      }
    }else if($col == 'sem'){
      if(!empty($value)){
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where c_sem = '$value' AND student.dept = '$dept' ORDER BY dept";
      }else{
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.dept = '$dept' ORDER BY c_sem DESC, s_id ASC";
      }
    }else if($col == 'att'){
      echo "*student records are sorted and grouped in sem, the first row you will see is student who have highest or lowest attendance in his/her sem.";
      if($value == 'ASC' || $value == 'asc'){
        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.dept = '$dept' ORDER BY c_sem DESC, `total-att` ASC";
      }else{

        $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.dept = '$dept' ORDER BY c_sem DESC, `total-att` DESC";
      }
    }else{
      $query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.dept = '$dept' order by student.dept, c_sem DESC, s_id ASC";
    }
  }else{
    //$query="select * from student INNER JOIN parents ON parents.p_id = student.p_id where student.dept = '$dept' order by student.dept, sem, s_id";
   $query="select * from student inner join parents on parents.p_id = student.p_id where student.dept = '$dept' ORDER BY student.dept, c_sem DESC, student.s_id ASC";
  }
}
?>
</table>
<body>
  
<?php 
  if($_SESSION['utype'] == 'student' || $_SESSION['utype'] == 'parent'){ echo "
  <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
        <tr>
          <th>S ID</th><th>Stu. Name</th><th>Total Attendance</th><th>Semester</th><th>Department</th><th>Fees Paid?</th><th>P ID</th><th>P Name</th><th>Parent Contact Number</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <tbody> ";
  }
  if($_SESSION['utype'] == 'parent' || $_SESSION['utype'] == 'student'){
    if(isset($query)){
      if($run = $conn->query($query)){
        while($data = $run->fetch_assoc()){
          echo "<tr><td>".$data['s_id']."</td><td>".$data['s_name']."</td><td>".$data['total-att']."</td><td>".$data['c_sem']."</td><td>".$data['dept']."</td><td>".$data['fees_p']."</td><td>".$data['p_id']."</td><td>".$data['p_name']."</td><td>".$data['cont_no']."</td></tr>"; 
        }
      }else{
        echo "Mysql error = ".mysqli_error($conn);
      }                  
    }       
  } 
  if($_SESSION['utype'] == 'lecturer'){ echo "
  <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <thead>
        <tr>
          <th>S ID</th><th>Stu. Name</th><th>Total Att.</th><th>Semester</th><th>Department</th><th>P ID</th><th>P Name</th><th>Parent Contact Number</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <tbody> ";
  }
  if($_SESSION['utype'] == 'admin'){ echo "
    <div class='tbl-header'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <thead>
      <tr>
          <th>S ID</th><th>Stu. Name</th><th>Total Att.</th><th>Semester</th><th>Department</th><th>Fees Paid?</th><th>P ID</th><th>P Name</th><th>Parent Contact Number</th> 
      </tr>
    </thead>
    </table>
    </div>
    <div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
    <tbody> ";
    }
  if($_SESSION['utype'] == 'admin'){
    if(isset($query)){
      if($run = $conn->query($query)){
        while($data = $run->fetch_assoc()){
        echo "<tr><td>".$data['s_id']."</td><td>".$data['s_name']."</td><td>".$data['total-att']."</td><td>".$data['c_sem']."</td><td>".$data['dept']."</td><td>".$data['fees_p']."</td><td>".$data['p_id']."</td><td>".$data['p_name']."</td><td>".$data['cont_no']."</td></tr>";    
        }
      }else{
                echo "Mysql error = ".mysqli_error($conn);
      }
    }
  }

          //   $query1="select * from parents where $col = '$value'";
          //   $query1="select * from parents";
          //   $query="select * from student where $col = '$value'";
          //   $query="select * from student";
          // Parent ID, Parent Name, Parent Contact No., Student ID, Student Name, Semester, Department, Total Attendance
          //-----------------------------------------------------
  if($_SESSION['utype'] == 'lecturer'){
    if(isset($query)){
      if($run = $conn->query($query)){
        while($data = $run->fetch_assoc()){
          if($data['dept'] == $dept){
            echo "<tr><td>".$data['s_id']."</td><td>".$data['s_name']."</td><td>".$data['total-att']."</td><td>".$data['c_sem']."</td><td>".$data['dept']."</td><td>".$data['p_id']."</td><td>".$data['p_name']."</td><td>".$data['cont_no']."</td></tr>";
          }
        }
      }
    }
  }          
?>  
</table>
      </tbody>
    </table>
  </div>
</section>


<!-- follow me template -->
<div class="made-with-love">
 <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="disp/js/index.js"></script>

</body>
</html>
