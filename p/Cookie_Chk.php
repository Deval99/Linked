<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Login PHP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
      <link rel='stylesheet' href='../disp/disp/css/style.css'>
<style type='text/css'>
.sort {vertical-align: center;text-align: center; margin-top: 30px;}
input {margin: 20px; padding: 5px;}
</style>
</head> 
<body>
<h1 style="padding: 10px; margin:100px; ">
<?php 
if (empty($_COOKIE['login-attempt'])) {
	echo "Its Empty !";
} else {
	echo "It's NOT Empty !";
	print_r($_COOKIE);
}
?>
</h1>
<div class='made-with-love'>
 <p> &copy; 2017 Linked . All Rights Reserved | Design by Linked Team</a></p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='../disp/disp/js/index.js'></script>

</body>
</html>