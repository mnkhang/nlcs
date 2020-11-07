<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập - Website Nấu Ăn </title>
<link rel="stylesheet" href="style.css" />
<link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
</head>
<body style="overflow:hidden;">
<?php
  require('db.php');
  session_start();
    if (isset($_POST['id'])){
    $id = stripslashes($_REQUEST['id']);
    $id = mysqli_real_escape_string($con,$id);
    $pass = stripslashes($_REQUEST['pass']);
    $pass = mysqli_real_escape_string($con,$pass);
        $query = "SELECT * FROM `tai_khoan` WHERE id='$id' and pass='".md5($pass)."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['id'] = $id;
      header("Location: index.php");
            }else{
        echo "<div class='form'><h3>Tên đăng nhập hoặc mật khẩu không đúng!</h3></br><a href='login.php'>Đăng nhập lại</a></div>"; 
        }
    }else{
?> 
<div id="khung">
<div class="form">
<h1>Đăng nhập</h1>
<form action="" method="post" name="login">
<input type="text" name="id" placeholder="Tên đăng nhập" required />
<input type="pass" name="pass" placeholder="Mật khẩu" required />
<input name="submit" type="submit" value="Đăng nhập" />
</form>
<p>Bạn chưa có tài khoản? <a href='registration.php'>Đăng ký ngay</a></p><br/>
</div>
</div>
<?php } ?>
</body>
</html>