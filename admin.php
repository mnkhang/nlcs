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
	else header("location: index.php");
	$somon1trang=10;
	$trang=$_GET['trang'];
	if (!$trang) {
		$trang=1;
	}
	$trang;
	$vitri=($trang-1)*$somon1trang;
?>
		<!DOCTYPE html >
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="admin.css"/>
			<title>REVIEW</title>
		</head>
		<body>
    </body>
			<div class="drapper">
				<div class="top">
					<center><a href="admin.php"><image src="imags/logo.jpg" height="150px" width="500px"></a></center>
				</div>
				<center><div class="center">
					<div class="danhsach">
							<a href="admin.php"><img src="imags/mon_an.png" style="width:50px;height:50px"></a>
							&emsp;
							<a href="admin.php?op=tai_khoan"><img src="imags/tai_khoan.png" style="width:50px;height:40px"></a>
						<br>
						<br>
						<h3>DANH SÁCH</h3>
						<?php
							include('db.php');
							if($_GET['op']=='tai_khoan'){
								$result = $conn->query("SELECT * FROM tai_khoan LIMIT $vitri,$somon1trang");
								echo "<table width='995px' border='1'>";
								echo "<tr><th>Họ tên</th><th>Tên đăng nhập</th><th>Mật khẩu</th><th>SĐT</th><th>Giới tính</th><th>Chức vụ</th><th>Action</th></tr>";
								while ($row = $result->fetch_assoc()){
									echo "<tr>";
									echo "<td><center>" . $row["hoten"] . "</td>";
									echo "<td><center>" . $row["id"] . "</td>";
									echo "<td><center>*******</td>";
									echo "<td><center>" . $row["sdt"] . "</td>";
									echo "<td><center>" . $row["gioitinh"] . "</td>";
									echo "<td><center>" . $row["chucvu"] . "</td>";
									echo "<td><center><a href='them_sua.php?op=tai_khoan&action=sua&id=" . $row["id"] . "'> Sửa </a> &emsp; <a href='xoa.php?op=tai_khoan&id=" . $row["id"] . "'> Xoá </a></td>";
									echo "</tr>";
								}
								echo "</table>";
								echo "<center><a href='them_sua.php?op=tai_khoan'>+ Thêm mới một tài khoản </a>";
								echo "<br><br>";
								$result = $conn->query("SELECT * FROM tai_khoan");
			                    $tongso_mon = $result->num_rows;
			                    $sotrang = ceil($tongso_mon/$somon1trang);
			                    echo " <center style='line-height:50px;''>";
			                    for($i=1; $i<=$sotrang; $i++){
			                    	if($trang==null) $trang=1;
			                    	if($trang==$i){
			                    		echo "<a href='admin.php?op=tai_khoan&trang=$i'style='color:red'>Trang $i</a>&emsp;";
			                    	}
			                    	else echo "<a href='admin.php?op=tai_khoan&trang=$i'>Trang $i</a>&emsp;";
			                    }echo "</center>";
							}

							else {
								$result = $conn->query("SELECT * FROM thuc_an LIMIT $vitri,$somon1trang");
								echo "<table width='1195px' border='1'>";
								echo "<tr><th>Tên</th><th>Loại</th><th>Nguyên liệu chính</th><th>Lượt xem</th><th>Nguyên liệu</th><th>Mô tả</th><th>Action</th></tr>";
								while ($row = $result->fetch_assoc()){
									echo "<tr>";
									echo "<td><center>" . $row["ten"] . "</td>";
									echo "<td><center>" . $row["loai"] . "</td>";
									echo "<td><center>" . $row["nguyen_lieu"] . "</td>";
									echo "<td><center>" . $row["luot_xem"] . "</td>";
									echo "<td><center>" . $row["nguyen_lieu_phu"] . "</td>";
									echo "<td><center>" . $row["mo_ta"] . "</td>";
									$ten=$row["ten"];
									$ten=urlencode( base64_encode( $ten ) );
									echo "<td><center><a href='them_sua.php?action=sua&ten=$ten'>Sửa</a> <br>&ensp; <a href='xoa.php?op=1&ten=$ten'> Xoá </a></td>";
									echo "</tr>";
								}
								echo "</table>";
								echo "<center><a href='them_sua.php'>+ Thêm mới một món ăn mới </a>";

								echo "<br><br>";
								$result = $conn->query("SELECT ten FROM thuc_an");
			                    $tongso_mon = $result->num_rows;
			                    $sotrang = ceil($tongso_mon/$somon1trang);
			                    echo " <center style='line-height:50px;''>";
			                    for($i=1; $i<=$sotrang; $i++){
			                    	if($trang==null) $trang=1;
			                    	if($trang==$i){
			                    		echo "<a href='admin.php?trang=$i'style='color:red'>Trang $i</a>&emsp;";
			                    	}
			                    	else echo "<a href='admin.php?trang=$i'>Trang $i</a>&emsp;";
			                    }echo "</center>";
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
