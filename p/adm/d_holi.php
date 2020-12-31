<!DOCTYPE html>
<html > <!-- cid,sid,lid,date,details     cid,details -->
<head>
  <meta charset='UTF-8'>
  <title>Declare Holiday</title>
  <script src='https://s.codepen.io/assets/libs/modernizr.js' type='text/javascript'></script>
  <link rel='stylesheet' href='temp/css/style.css'>
</head>

<body>
<center><h1 style="padding-top: 200px;">
  <?php 
session_start();
require('../linked_conn.php');
if(isset($_SESSION['utype'])){
  if($_SESSION['utype'] == 'admin'){ 
    //post -- days,f_date,reason
    $days = mysqli_real_escape_string($conn, @$_POST['days']);
    settype($days , "integer");
    $f_date = mysqli_real_escape_string($conn, @$_POST['f_date']);
    $reason = mysqli_real_escape_string($conn, @$_POST['reason']);
    if(!empty($days)&&!empty($f_date)&&!empty($reason)){
      if($days<=10 && $days >= 1 && !($f_date <= date('Y-m-d')) && !(strlen($reason) > 20)){
        //db -- hid,days,occ,date
        $first = "select * from holiday where date = '$f_date' AND days = '$days'";
        if($res1 = $conn->query($first)){
          $assoc = $res1->fetch_assoc();
          if(!empty($assoc)){
            print_r($assoc);
            die("You have already entered this holiday ! <br><br> <a href='../../form/adm/d_holi.php'>Go to form</a><br><br><a href='../../index.php'>Go to index</a>");
          }
        }
        $query = "insert into holiday(hid,days,occ,date) values(DEFAULT, '$days', '$reason', '$f_date')";
        if($res2 = $conn->query($query)){
          echo "Holiday Declare Success ! -- Rows Inserted = ".mysqli_affected_rows($conn);
        }else{
          echo "Main query failed ! -- Mysql error = ".mysqli_error($conn);
        }
      }else{
        echo "This form is not valid ! Please check,<br> 'Reason' is less than or equal to 20 charactors<br> FromDate is not currentDate or pastDate<br> 'Days' is less than 10<br><br> Now You Will Be Redirected To That Page In 10 Seconds.";
          header('Refresh: 10; url= ../../form/r_comp.php',303,false);
      }
    }else{
      echo "Please fill all details !<br><br> Now You Will Be Redirected To That Page In 10 Seconds.";
      header('Refresh: 10; url= ../../form/r_comp.php',303,false);
    }
  }else{
    echo "<center><h1 style='padding: 100px;'>This page is only for admin ! You Will Be Redirected To Main age In 10 Seconds.</h1></center>";
    header('Refresh: 10; url= ../../index.php',303,false);
  } 
 } else{
  echo "<center><h1 style='padding: 100px;'>Please login first ! You Will Be Redirected To Login Page In 10 Seconds.</h1></center>";
  header('Refresh: 10; url= ../../index.php',303,false);
}

?>
</h1>
</center>
</body>
</html>