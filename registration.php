<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
  require('db.php');
    if (isset($_REQUEST['id'])){
    $id = stripslashes($_REQUEST['id']);
    $id = mysqli_real_escape_string($con,$id);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['pass']);
    $password = mysqli_real_escape_string($con,$password);
    $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (id, pass, email, trn_date) VALUES ('$id', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>Bạn đã đăng ký thành công</h3><br/>Click để <a href='login.php'>Đăng nhập</a></div>";
        }
    }else{
?>
<div id="khung">
<div class="form">
<h1>Đăng ký</h1>
<form name="registration" action="" method="post">
<input type="text" name="id" placeholder="Tên đăng nhập" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="pass" placeholder="Mật khẩu" required />
<input type="submit" name="submit" value="Đăng ký" />
</form>
</div>
<?php } ?>
</body>
</html>
    </div>