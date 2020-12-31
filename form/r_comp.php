<!DOCTYPE html>
<html > <!-- cid,sid,lid,date,details     cid,details -->
<head>
  <meta charset='UTF-8'>
  <title>Reply To Complaint</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>
<style type="text/css">th,td{padding: 5px; border-bottom: 1px solid #ddd; text-align: center;}</style>
<body> 
<?php @session_start(); 
if(isset($_SESSION['utype'])){
  if($_SESSION['utype'] == 'parent'){ 
      echo"<form action='../p/r_comp.php' method='POST'>
      <br/>";

      @session_start();
      $sid = $_SESSION['p_sid'];
      require('../p/linked_conn.php');
      $query1 = "SELECT * from `complaints` where `sid`= '$sid' && `r_flag` = 'p'";
      if($run = $conn->query($query1)){
        $rows = array();
        while($row = $run->fetch_assoc()){
            $rows[] = $row;
        }
        if(!empty($rows)){
          echo"<h1>Reply To Complaint</h1>
          <center><table margin-top: 10px;'>
          <th>Complaint ID</th><th>Details</th> ";
          $run2 = $conn->query($query1);
            while($row = $run2->fetch_assoc()){
              echo "<tr><td>".$row['cid']."</td><td>".$row['details']."</td><tr>";    //'<br>'.$row['details'];
            }
          $_SESSION['rows'] = $rows;
          echo "<hr style='width: 100%'><br></table></center>";
          echo '<br>'.'<br>'."Please Enter Complaint ID From Above Table To Below Text Area";
          echo "<span class='input'></span>
          <input type='number' name='cid' min='0' max='99999999999' placeholder='Put Complaint ID Here' autofocus autocomplete='off' required/>
          <span class='input' ></span>
          <h5>*limit for Reply - 100 Charactors</h5>
          <textarea maxlength='100' style='resize:none; height: 40px; width: 260px; padding:10px;' name='details' id='details' placeholder='Enter Reply' required on></textarea>
          <script type='text/javascript'>
            document.addEventListener('DOMContentLoaded',blank);
            function blank(){
              document.getElementById('details').value = ' ';
            }
          </script>
          <br><br><br>
          <button type='submit' value='Submit' title='Submit' class='icon-arrow-right'><span>Submit</span></button>
          </form>
          <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
          <script src='js/index.js'></script>";
        }else{
          echo "<h1>There Are Not Any Complaints Yet !</h1>";
        }
      }else{
      echo "<h1>Table Fetch Error".mysqli_error($conn)."</h1>";
      }
   }else{
    echo "<center><h1 style='padding: 100px;'>This Page Is Only For Parents ! You Will Be Redirected To Main age In 10 Seconds.</h1></center>";
    header('Refresh: 10; url= ../index.php',303,false);
   } 
} else{
  echo "<center><h1 style='padding: 100px;'>Please Login First ! You Will Be Redirected To Login Page In 10 Seconds.</h1></center>";
  header('Refresh: 10; url= ../index.php',303,false);
}
?>
</body>
</html>