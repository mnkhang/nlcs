<?php
include("auth.php")?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta>
        <title>Nau An</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>  
        <header>
        
           <a href="#" class="logo">Food<span>.</span></a> 
           <div class="form">
           <p>Xin chào <?php echo $_SESSION['username']; ?>!</p>
            </div>
           <ul class=navigation>
            <li><a href="#banner">Trang Chủ</a></li>
            <li><a href="#recipi">Công Thức</a></li>
            <li><a href=#about>Về Chúng Tôi</a></li>
            <li><a href=#contact>Liên Hệ</a></li>
            <li><a href=login.php>Đăng Nhập</a></li>    
            <li><a href=logout.php>Đăng Xuất</a></li>
           </ul>
        </header>
        <section class="banner" id="banner">
            <div class="content">
                <h2>Công thức nấu ăn</h2>
                <p></p>
                <a href="#" class="btn">Xem các món ăn</a>
              <!-- <img src="bg.jpg" width="100%" height="100%">  -->
            </div>
        </section>

        <section class="about" id="about">
            <div class="row">
                <div class="col50">
                    <h2 class="titleText"><span>D</span>anh sách các món ăn:</h2>
                    <ul class="list_eat">
                        <li><a href="#" class="xao">Món Xao</a></li>
                    
                        <li><a href="#" class="canh">Món Canh</a></li>

                        <li><a href="#" class="chien">Món Chiên</a></li>

                        <li><a href="#" class="hap">Món Hấp</a></li>

                        <li><a href="#" class="nuong">Món Nướng</a></li>   
                    </ul>
                </div>
                <div class="col50">
                    <div class=imgBx>
                        <img src="img1.jpg" wight="550" height="330">
                    </div>
                </div>
            </div>
        </section>
        <div class="copyrightText">
            <p>Copyright 2020 Make <a href="#">by MnKhang</a>. All Right C</p>
        </div>
        <script type='text/javascript'>
    </body>
</html>