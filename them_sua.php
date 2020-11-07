<?php session_start();
		if (isset($_SESSION['id']) && $_SESSION['id']){
		$id = $_SESSION['id'];
		include('db.php');
		$result = $conn->query("SELECT hoten,chucvu FROM tai_khoan where id = '$id'");
		$row = $result->fetch_assoc();
		if($row["chucvu"]=='admin'){
			echo "Xin chào admin ".$row["hoten"].".<a href='logout.php'>Đăng xuất</a>";
		}
		else {
			echo "Không có quyền truy cập vào trang quản lí.<a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}
	}
	else {
		header("location: ../index.php");
		exit;
	}
?>
		<!DOCTYPE html >
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="admin.css"/>
			<title>REVIEW</title>
		</head>
		<body>
			<div class="drapper">
				<div class="top">
					<center><a href="admin.php"><image src="imags/logo.jpg" height="150px" width="500px"></a></center>	
				</div>
				<center><div class="center">
					<div class="danhsach">
						<br>
						<br>
						<?php 
							include('db.php');
							$action = $_GET['action'];
							$op = $_GET['op'];
							$ten = $_GET['ten'];
							if (isset($_SESSION['id']) && $_SESSION['id']){
								if($op=='tai_khoan'){
									if($action=='sua'){
										$id = $_GET['id'];
										$result = $conn->query("SELECT * FROM tai_khoan where id = '$username'");
										$row = $result->fetch_assoc();
										echo "<form action='xu_li/sua.php?op=tai_khoan&id=$id' method='POST'><table width='500px' style='border-spacing:8px'>"; 
										echo "<tr><th style='text-align:right'>Tên đăng nhập: </th><td><center>$id</td></tr>";
										echo "<tr><th style='text-align:right'>Mật khẩu: </th>"; echo "<td><center><input type=text name='pass' value = " . $row["pass"] . "></td></tr>";
										echo "<tr><th style='text-align:right'>Họ và tên: </th>"; echo "<td><center><input type=text name='hoten' value = '" . $row["hoten"] . "'></td></tr>";
										echo "<tr><th style='text-align:right'>SĐT: </th>"; echo "<td><center><input type=text name='sdt' value = " . $row["sdt"] . "></td></tr>";
										if($row["gioitinh"]=='nam'){
											echo "<tr><th style='text-align:right'>Giới tính: </th>"; echo "<td><center><input type='radio' name='gioitinh' value='nam' checked='checked'>Nam&nbsp;&emsp;&emsp;&emsp;<input type='radio' name='gioitinh' value='nu'> Nữ&nbsp;&nbsp;&ensp;</td></tr>";
										}
										else if($row["gioitinh"]=='nu'){
											echo "<tr><th style='text-align:right'>Giới tính: </th>"; echo "<td><center><input type='radio' name='gioitinh' value='nam'>Nam&nbsp;&emsp;&emsp;&emsp;<input type='radio' name='gioitinh' value='nu'checked='checked'> Nữ&nbsp;&nbsp;&ensp;</td></tr>";
										}
										if($row["chucvu"]=='admin'){
											echo "<tr><th style='text-align:right'>Chức vụ: </th>"; echo "<td><center><input type='radio' name='chucvu' value='admin' checked='checked'>ADMIN&emsp;&emsp;<input type='radio' name='chucvu' value='user'> USER</td></tr>";
										}
										else{
											echo "<tr><th style='text-align:right'>Chức vụ: </th>"; echo "<td><center><input type='radio' name='chucvu' value='admin' >ADMIN&emsp;&emsp;<input type='radio' name='chucvu' value='user' checked='checked'> USER</td></tr>";
										}
										
										echo "</table><br><br><input type='reset' value='ĐẶT LẠI' style='width:70px;height:25px;cursor: pointer;'>&emsp;&emsp;<input type='submit' value='SỬA' style='width:70px;height:25px;cursor: pointer;'><br><br><br></form>";
									}
									else {
										echo "<form action='them.php?op=tai_khoan' method='POST'><table width='500px' style='border-spacing:8px'>"; 
										echo "<tr><th style='text-align:right'>Tên đăng nhập: </th>";echo "<td><center><input type=text name='id' ></td></tr>";
										echo "<tr><th style='text-align:right'>Mật khẩu: </th>"; echo "<td><center><input type=text name='pass'></td></tr>";
										echo "<tr><th style='text-align:right'>Họ và tên: </th>"; echo "<td><center><input type=text name='hoten'></td></tr>";
										echo "<tr><th style='text-align:right'>SĐT: </th>"; echo "<td><center><input type=text name='sdt'></td></tr>";
										echo "<tr><th style='text-align:right'>Giới tính: </th>"; echo "<td><center><input type='radio' name='gioitinh' value='nam'>Nam&nbsp;&emsp;&emsp;&emsp;<input type='radio' name='gioitinh' value='nu'> Nữ&nbsp;&nbsp;&ensp;</td></tr>";
										echo "<tr><th style='text-align:right'>Chức vụ: </th>"; echo "<td><center><input type='radio' name='chucvu' value='admin'>ADMIN&emsp;&emsp;<input type='radio' name='chucvu' value='user'> USER</td></tr>";
										echo "</table><br><br><input type='reset' value='ĐẶT LẠI' style='width:70px;height:25px;cursor: pointer;'>&emsp;&emsp;<input type='submit' value='THÊM' style='width:70px;height:25px;cursor: pointer;'><br><br><br></form>";
									}
								}
								else{
									if($action=='sua'){
										$ten_mahoa = $_GET['ten'];
										$ten = base64_decode( urldecode( $ten_mahoa ) );
										$result = $conn->query("SELECT * FROM thuc_an where ten = '$ten'");
										$row = $result->fetch_assoc();
										$hinh_anh=$row["hinh_anh"];
										$mo_ta=$row["mo_ta"];
										echo "<form action='sua.php?op=mon_an&ten=$ten_mahoa' enctype='multipart/form-data' method='POST'><table width='500px' style='border-spacing:8px'>"; 
										echo "<tr><th style='text-align:right'>Tên món ăn: </th>";echo "<td><center>$ten</td></tr>";
										echo "<tr><th style='text-align:right'>Loại: </th>"; echo "<td><center><input type=text name='loai' value = '" . $row["loai"] . "'></td></tr>";
										echo "<tr><th style='text-align:right'>Nguyên liệu chính: </th>"; echo "<td><center><input type=text name='nguyen_lieu' value = '" . $row["nguyen_lieu"] . "'></td></tr>";
										echo "<tr><th style='text-align:right'>Nguyên liệu: </th>"; echo "<td><center><input type=text name='nguyen_lieu_phu' value = '" . $row["nguyen_lieu_phu"] . "'></td></tr>";
										echo "<tr><th style='text-align:right'>Lượt xem: </th>"; echo "<td><center><input type=text name='luot_xem' value = '" . $row["luot_xem"] . "'></td></tr>";
										echo "<tr><th style='text-align:right'>Ảnh hiện tại: </th>"; echo "<td><center><image src='".$row["hinh_anh"]."'  height=150px width=200px></td></tr>";
										echo "<tr><th style='text-align:right'>Tải ảnh lên: </th>"; echo "<td><center><input type=file name='hinh_anh'></td></tr>";
										echo "<tr><th style='text-align:right'>Mô tả: </th>"; echo "<td><center><textarea rows='5'cols='33' name='mo_ta'>" . $row["mo_ta"] . "</textarea></td></tr>";
										echo "</table><br><br><input type='reset' value='ĐẶT LẠI' style='width:70px;height:25px;cursor: pointer;'>&emsp;&emsp;<input type='submit' value='SỬA' style='width:70px;height:25px;cursor: pointer;'><br><br><br></form>";
									}
									else{   
										echo "<form action='them.php?op=mon_an' enctype='multipart/form-data' method='POST'><table width='500px' style='border-spacing:8px'>"; 
										echo "<tr><th style='text-align:right'>Tên món ăn: </th>";echo "<td><center><input type=text name='ten' ></td></tr>";
										echo "<tr><th style='text-align:right'>Loại: </th>"; echo "<td><center><input type=text name='loai'></td></tr>";
										echo "<tr><th style='text-align:right'>Nguyên liệu chính: </th>"; echo "<td><center><input type=text name='nguyen_lieu'></td></tr>";
										echo "<tr><th style='text-align:right'>Nguyên liệu: </th>"; echo "<td><center><input type=text name='nguyen_lieu_phu'></td></tr>";
										echo "<tr><th style='text-align:right'>Lượt xem: </th>"; echo "<td><center><input type=text name='luot_xem'></td></tr>";
										echo "<tr><th style='text-align:right'>Tải ảnh lên: </th>"; echo "<td><center><input type=file name='hinh_anh'></td></tr>";
										echo "<tr><th style='text-align:right'>Mô tả: </th>"; echo "<td><center><textarea rows='5'cols='33' name='mo_ta'></textarea></td></tr>";
										echo "</table><br><br><input type='reset' value='ĐẶT LẠI' style='width:70px;height:25px;cursor: pointer;'>&emsp;&emsp;<input type='submit' value='THÊM' style='width:70px;height:25px;cursor: pointer;'><br><br><br></form>";
									}
								}
							}
							else{
	        					echo 'Bạn chưa <a href=login.php>đăng nhập</a>';
	     					}
							
						 ?>
					</div>
				</div></center>
				<div class="footer">
					<br>
					<center><h3>Hotline: 0123456789&emsp;Gmail: foodsearch@abc@gmail.com.vn </h3><br><p>CÔNG TY TNHH MỘT THÀNH VIÊN FOODSEARCH</p></center>
				</div>
			</div>
		</body>
		</html>