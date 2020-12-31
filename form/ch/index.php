<!DOCTYPE html>
<html lang='en' >
<head>
  <meta charset='UTF-8'>
      <link rel='stylesheet' href='css/style.css'>
</head>
<body>
  <section>
  <div class='container'>
    <form style='margin-top: 20px;' action='#' method='get'>
  	<?php 
    session_start();
    if($_SESSION['utype'] == 'lecturer'){
    if(@$_GET != NULL){
      if(@$_GET['ch'] == 'sstu_rec_s'){
        if(@$_SESSION['hod'] == true){
          echo "
          <title>Semwise Student Record Submit</title>
          <button type='submit' formaction='../lec/sstu_rec_sb.php' class='entypo-right-open-big'>Bulk (Semester, Attendance will be fetched automatically)</button>
          <br><br><br><br>
          <button type='submit' formaction='../lec/sstu_rec_sbds.php' class='entypo-right-open-big'>Bulk (Need to enter Semester, Attendance)</button>
          <br><br><br><br>
          <button type='submit' formaction='../lec/sstu_rec_so.php' class='entypo-right-open-big'>Single</button>
          ";
        }else{
          echo "<script type='text/javascript'>alert('You are not HOD !');</script>";
          header("Refresh:0; url='../../index.php'",303,false);
        }  
      }else if(@$_GET['ch'] == 'sstu_rec_d'){
        if(@$_SESSION['hod'] == true){
          echo "
          <title>Semwise Student Record Delete</title>
          <button type='submit' formaction='../lec/sstu_rec_db.php' class='entypo-right-open-big'>Bulk</button><br><br><br><br>
          <button type='submit' formaction='../lec/sstu_rec_d.php' class='entypo-right-open-big'>Single</button>";
        }else{
          echo "<script type='text/javascript'>alert('You are not HOD !');</script>";
          header("Refresh:0; url='../../index.php'",303,false);
        }    
      }else if(@$_GET['ch'] == 'r_test_s'){
        echo "
        <title>Surprise Test Record Submit</title>
        <button type='submit' formaction='../lec/r_test_sn.php' class='entypo-right-open-big'>Bulk</button>
        <br><br><br><br>
        <button type='submit' formaction='../lec/r_test_s.php' class='entypo-right-open-big'>Single</button>";  
      }else if(@$_GET['ch'] == 'r_test_d'){
        echo "
        <title>Surprise Test Record Delete</title>
        <button type='submit' formaction='../lec/r_test_d.php' class='entypo-right-open-big'>Single</button>
        <br><br><br><br>
        <button type='submit' formaction='../lec/r_test_db.php' class='entypo-right-open-big'>Bulk</button>";  
      }else if(@$_GET['ch'] == 'm_marks_s'){
        echo "
        <title>Surprise Test Record Delete</title>
        <button type='submit' formaction='../lec/m_marks_s.php' class='entypo-right-open-big'>Single</button>
        <br><br><br><br>
        <button type='submit' formaction='../lec/m_marks_sb.php' class='entypo-right-open-big'>Bulk</button>";  
      }else if(@$_GET['ch'] == 'm_marks_d'){
        echo "
        <title>Surprise Test Record Delete</title>
        <button type='submit' formaction='../lec/m_marks_d.php' class='entypo-right-open-big'>Single</button>
        <br><br><br><br>
        <button type='submit' formaction='../lec/m_marks_db.php' class='entypo-right-open-big'>Bulk</button>";  
      }else{
        header("Refresh:0; url='../../index.php'",303,false);
      }
    }else{
      header("Refresh:0; url='../../index.php'",303,false);
    }
  }else{
    header("Refresh:0; url='../../index.php'",303,false);
  }
  ?>
  </div>
</section>
    <script  src='js/index.js'></script>
</body>
</html>
