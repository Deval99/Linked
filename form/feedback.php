<!DOCTYPE html>
<html > <!-- f_id, p_id, subject, details, date -->
<head>
  <meta charset='UTF-8'>
  <title>Feedback</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<body> <?php @session_start(); if(isset($_SESSION['utype'])){ if($_SESSION['utype'] == 'parent'){ ?>
  <form action='../p/feedback.php' method='POST'>
  <h1>Feedback</h1><br/>
<h5>*limit for subject - 20 Charactors<br>*limit for details - 200 Charactors</h5>
  <span class='input'></span>
  <input type='text' maxlength="20" name='subject' placeholder='Subject' autofocus autocomplete='off' required/>
  <span class='input' ></span>
 <textarea maxlength="200" style='height: 40px; width: 260px; padding:10px;' name='details' placeholder='Details' autocomplete='off' required></textarea>

  <br><br><br>
  <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='js/index.js'></script> <?php } else{
      echo "<center><h1 style='padding: 100px;'>This Page Is Only For Parents !!</h1></center>";
    } 
  } else{
    echo "<center><h1 style='padding: 100px;'>Please Login !!</h1></center>";
  }
?>
</body>
</html>
