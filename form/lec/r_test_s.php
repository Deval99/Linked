<!DOCTYPE html>
<html> 
<head>
  <meta charset='UTF-8'>
  <title>Surprise Test Marks Submit</title>
  <!-- <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script> -->
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <link rel='stylesheet' href='../temp/css/style.css'>
  <link rel="stylesheet" type="text/css" href="../style_combo.css">
</head>
<body> <?php @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'lecturer'){ ?>
  <form action='../../p/lec/r_test_s.php' method='POST' >
  <h1>Surprise Test Marks Submit</h1><br/>
  <!-- t_id,l_id,s_id*,subject*,marks*,date -->
  <h5>Enter Details Carefully !<br> For S_ID - *10 charactors allowed <br> For Subject - *20 charactors allowed<br>Pattern for S_ID = S... (S is Capital) ex. S01<br></h5>

  <span class='input'></span>
  <input type='text' maxlength="10" required id='s_id' maxlength="10" name='s_id' placeholder='Student ID (Pattern = S... (S is Capital))' autofocus autocomplete='off' pattern="[S][0-9]+" />

   <span class='input'></span>
  <input type='number' onkeydown='javascript: return event.keyCode == 69 ? false : true' maxlength="10" required id='t_id' maxlength="10" name='t_id' placeholder='Test ID' autofocus autocomplete='off' onchange='val9()'/>
<script type="text/javascript">
  function val9(){
    var t_id = document.getElementById('t_id').value;
    if(t_id < 1){
      alert('Test id doesn\'t seem correct !');
      document.getElementById('t_id').value = 1;
    }
  }
</script>
  <!-- <span class='input'></span>
  <input type='text' maxlength="20" required id='subject' name='subject' placeholder='Subject' autofocus autocomplete='off'/> -->
<?php
  require('../../p/linked_conn.php');
  $l_id = $_SESSION['id'];
  $sel = "select * from lecturer where l_id = '$l_id'";
  if($res = $conn->query($sel)){
    $data = $res->fetch_assoc();
    if(!empty($data)){
                 
      echo "<span class='input'></span><select id='soflow' style='width:80%; padding:2%;' name='subject'><option>".$data['subj']."</option>";
      echo "<option>".$data['subj2']."</option>";
      echo "<option>".$data['subj3']."</option>";
      echo "<option>".$data['subj4']."</option>";
      echo "<option>".$data['subj5']."</option>";
      echo "<option>".$data['subj6']."</option></select>";
    }else{
      die("Can't fetch data ! <br><br> <a href='../../index.php'>Go to home</a> <br><br> ");
    }
  }else{
    echo "Query failed - mysql error -> ".mysqli_error($conn);
  }
?>
<span class='input'></span>
      <input type='number' max="100" required id='t_marks' name='t_marks' placeholder='Total Marks(10 to 100)' autofocus autocomplete='off' onchange="val1()" onkeydown="javascript: return event.keyCode == 69 ? false:true"/>

      <span class='input'></span>
      <input type='number' max="100" required id='marks' name='marks' placeholder='Marks' autofocus autocomplete='off' onchange="val()" onkeydown="javascript: return event.keyCode == 69 ? false:true"/>
    <script type="text/javascript">
      function val(){
        var marks = document.getElementById('marks').value;
        if(marks > 100 || marks < 0){
          alert('Please Enter Valid Marks !');
          document.getElementById('marks').value = 0;
        }
      }
      function val1(){
        var t_marks = document.getElementById('t_marks').value;
        if(t_marks < 10 || t_marks > 100){
          alert('Please enter valid Total marks(10 to 100)');
          document.getElementById('t_marks').value = 10;
        }
      }
    </script>
      <br><br><br>
      <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
      
    </form>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src='../temp/js/index.js'></script> <?php 
  } else{   
     echo "<center><h1 style='padding: 100px;'> This Page Is Only For Parents ! <br><br> <a href='../../index.php'>Go to home</a></center>";
    } 
} else{
  echo "<center><h1 style='padding: 100px;'> Please Login First ! <br><br> <a href='../../index.php'>Go to home</a></center>";
}
?> 
<div class="footer-w3l">
  <center><p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p></center> 
</div>
</body>
</html>

