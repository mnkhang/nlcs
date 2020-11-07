<?php session_start();
	$op=$_GET['op'];
	if($op=='tai_khoan'){
		$id=$_POST['id'];
		$pass=$_POST['pass'];
		// $hoten=$_POST['hoten'];
		// $sdt=$_POST['sdt'];
		// $gioitinh=$_POST['gioitinh'];
		$chucvu=$_POST['chucvu'];
		include('../db.php');
		$result=$conn->query("INSERT INTO tai_khoan(id,pass,hoten,sdt,gioitinh,chucvu) values ('$id','$pass','$hoten','$sdt','$gioitinh','$chucvu')") or die("Lỗi truy vấn");
		if($result){
			header("location: ../admin.php?op=tai_khoan");
		}
	}
	else{
		if ($_FILES['hinh_anh']['error'] > 0){
			echo "Upload ảnh bị lỗi";
		}
		else{
			$ten=$_POST['ten'];
			$loai=$_POST['loai'];
			$nguyen_lieu=$_POST['nguyen_lieu'];
			$nguyen_lieu_phu=$_POST['nguyen_lieu_phu'];
			$lượt_xem=$_POST['luot_xem'];
			$mo_ta=$_POST['mo_ta'];
			$hinh_anh="imags/".$_FILES['hinh_anh']['name'];
			include('../db.php');
			$result=$conn->query("INSERT INTO thuc_an(ten,loai,nguyen_lieu,nguyen_lieu_phu,luot_xem,hinh_anh,mo_ta) values ('$ten','$loai','$nguyen_lieu','$nguyen_lieu_phu','$lượt_xem','$hinh_anh','$mo_ta')") or die("Lỗi truy vấn");
			if($result){
				move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../imags/'.$_FILES['hinh_anh']['name']);
				header("location: ../admin.php");
			}
			
            
		}
	}
?>
