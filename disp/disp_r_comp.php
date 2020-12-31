<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>View Complaints/Reply To Complaints</title>

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="disp/css/reset.min.css">
      <link rel="stylesheet" href="disp/css/style.css">
      <link rel="stylesheet" href="disp/css/style1.css">

       <link rel="stylesheet" type="text/css" href="disp/css/text_area_style.css">
<style type="text/css">
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
textarea{width:100%; padding:8px; padding-right: 2px; }

</style>
</head> 
<body>
  <section>
  <center><a href="../index.php" class="nav-item">Go to home page</a></center>
<?php
session_start();
require('../p/linked_conn.php'); //s_id,present?,date,homework
  if (isset($_SESSION['utype'])) {
    if($_SESSION['utype'] == 'lecturer' || $_SESSION['utype'] == 'parent'){
      echo "<h1 style='padding-top:20px;'>View Complaints/Reply To Complaints</h1><br> <center><i>*To See All Records Leave 'value' Blank</i></center>";
    }else{
      die("<h1>Admin and students not allowed, Please login as Faculty or Parents !!</h1>");
    }
  }else{
      die("<h1>Please login !!</h1>");
  }


if($_SESSION['utype'] == 'lecturer'){
    $col = mysqli_real_escape_string($conn, @$_POST['col']);
    $value = mysqli_real_escape_string($conn, @$_POST['value']);
    $id = $_SESSION['id'];
    $today = date('Y-m-d');
    echo "<div class='sort'>
    <div class='container'>
    <form action='disp_r_comp.php'method='POST'>
    <h4 style='padding-right:20%;'>Select Column: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4>
  
  <select name='col' id='soflow'>
    <option value='cid'>Complaint ID</option>
    <option value='date'>Date (Descanding)(Enter ASC to sort ascending)</option>
    <option value='r_date'>Reply Date (Descanding)(Enter ASC to sort ascending)&nbsp; &nbsp; &nbsp; &nbsp;</option>
  </select>
  

<input name='value' type='text' placeholder='Value'></input>
<button type='submit' class='btn ripple'>Sort</button>
</form></div></div><br><center><h5>If 2nd and 3rd Columns Are Empty (Of Any Row), Then Reply Is Not Yet Submitted !</h5></center><br>
         <div class='tbl-header'>
          <table style='height:2000px;' cellpadding='0' cellspacing='0' border='0'>
            <thead>
               <tr>
                 <th>Complaints ID</th><th>Reply Details</th><th>Reply Date</th><th>Student ID</th><th>Lecturer ID</th><th>Complaint Date</th><th>Complaint Details</th>
              </tr>
             </thead>
          </table>
        </div>
        <div class='tbl-content'>
          <table cellpadding='0' cellspacing='0' border='0'>
            <tbody>";
  if(!empty($col)){
    if($col == 'cid'){
      if(empty($value)){
        $query9 = "select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where lid = '$_SESSION[id]' order by complaints.cid ASC, r_date DESC";
      }else{
        $query9 = "select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where lid = '$_SESSION[id]' AND complaints.cid = '$value' order by complaints.cid, r_date DESC";
      }
    }else if($col == 'date'){
      if($value == 'asc' || $value == 'ASC'){
        $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where lid = '$_SESSION[id]' ORDER BY date ASC";
      }else{
        $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where lid = '$_SESSION[id]'  ORDER BY date DESC";
      }
    }else if($col == 'r_date'){
      if($value == 'asc' || $value == 'ASC'){
        $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where lid = '$_SESSION[id]' ORDER BY r_date ASC";
      }else{
        $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where lid = '$_SESSION[id]' ORDER BY r_date DESC";
      }
    }
  }else{
     $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where lid = '$_SESSION[id]' ORDER BY r_date DESC";
  }
      if($res = $conn->query($query9)){
        while($data2 = $res->fetch_assoc()){
            echo "<tr><td>".$data2['cid']."</td><td><textarea readonly cols='23' rows='5'>".$data2['details']."</textarea></td><td>".$data2['r_date']."</td><td>".$data2['sid']."</td><td>".$data2['lid']."</td><td>".$data2['date']."</td><td><textarea readonly cols='23' rows='5'>".$data2['details']."</textarea></td></tr>";
        }
        echo "</table>";
      }else{
            echo "Query Failed ! -- MySql Error -> ".mysqli_error($conn);
      }
    
}

// function alert($str){
//     return '"'.'<script type="text/javascript">alert("' . $str . '")</script>'.'"';
// }
if ($_SESSION['utype'] == 'parent') {
  $col = mysqli_real_escape_string($conn, @$_POST['col']);
  $value = mysqli_real_escape_string($conn, @$_POST['value']);
  $id = $_SESSION['id'];
  $today = date('Y-m-d');
  echo "<div class='sort'>
    <div class='container'>
    <form action='disp_r_comp.php'method='POST'>
    <h4 style='padding-right:21%;'>Select Column: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter Value: </h4>
  
    <select name='col' id='soflow'>
      <option value='cid'>Complaint ID</option>
      <option value='date'>Date (Descanding)(No Need To Enter Value)</option>
      <option value='r_date'>Reply Date (Descanding)(No Need To Enter Value) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
    </select>
    <input name='value' type='text' placeholder='Value'></input>
    <button type='submit' class='btn ripple'>Sort</button>
    </form></div></div><br><center><h5>If 2nd and 3rd Columns Are Empty (Of Any Row), Then Reply Is Not Yet Submitted !</h5></center><br>
             <div class='tbl-header'>
              <table style='height:2000px;' cellpadding='0' cellspacing='0' border='0'>
                <thead>
                   <tr>
                     <th>Complaints ID</th><th>Reply Details</th><th>Reply Date</th><th>Student ID</th><th>Lecturer ID</th><th>Complaint Date</th><th>Complaint Details</th>
                  </tr>
                 </thead>
              </table>
            </div>
            <div class='tbl-content'>
              <table cellpadding='0' cellspacing='0' border='0'>
                <tbody>";
  if(!empty($col)){
    if($col == 'cid'){
      if(empty($value)){
        $query9 = "select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where sid = '$_SESSION[p_sid]' order by complaints.cid ASC, r_date DESC";
      }else{
        $query9 = "select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where sid = '$_SESSION[p_sid]' AND complaints.cid = '$value' order by complaints.cid, r_date DESC";
      }
    }else if($col == 'date'){
      if($value == 'asc' || $value == 'ASC'){
        $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where sid = '$_SESSION[p_sid]' ORDER BY date ASC";
      }else{
        $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where sid = '$_SESSION[p_sid]'  ORDER BY date DESC";
      }
    }else if($col == 'r_date'){
      if($value == 'asc' || $value == 'ASC'){
        $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where sid = '$_SESSION[p_sid]' ORDER BY r_date ASC";
      }else{
        $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where sid = '$_SESSION[p_sid]' ORDER BY r_date DESC";
      }
    }
  }else{
     $query9="select * from complaints inner join r_complaints on complaints.cid = r_complaints.cid where sid = '$_SESSION[p_sid]' ORDER BY r_date DESC";
  }
  if($res = $conn->query($query9)){
    while($data2 = $res->fetch_assoc()){
        echo "<tr><td>".$data2['cid']."</td><td><textarea readonly cols='23' rows='5'>".$data2['details']."</textarea></td><td>".$data2['r_date']."</td><td>".$data2['sid']."</td><td>".$data2['lid']."</td><td>".$data2['date']."</td><td><textarea readonly cols='23' rows='5'>".$data2['details']."</textarea></td></tr>";
    }
    echo "</table>";
  }else{
        echo "Query Failed ! -- MySql Error -> ".mysqli_error($conn);
  }
}
?>
</tbody>
    </table>
  </div>
</section>


<body>
<!-- follow me template -->
<div class="made-with-love">
 <p> &copy; 2017 linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="disp/js/index.js"></script>

</body>
</html>
