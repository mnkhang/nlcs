<?php session_start();
	if($_GET['op']=='tai_khoan'){
		echo $id=$_GET['id'];
		$pass=$_POST['pass'];
		// $hoten=$_POST['hoten'];
		// $sdt=$_POST['sdt'];
		// $gioitinh=$_POST['gioitinh'];
		$chucvu=$_POST['chucvu'];
		include('../db.php');
		$result=$conn->query("INSERT INTO tai_khoan(username,pass,hoten,sdt,gioitinh,chucvu) values ('$username','$password','$hoten','$sdt','$gioitinh','$chucvu')") or die("Lỗi truy vấn");
		if($result){
			header("location: ../admin.php?op=tai_khoan");
		}
	}
	else{
		include('../db.php');
		$ten=$_GET['ten'];
		$ten = base64_decode( urldecode( $ten ) );
		$loai=$_POST['loai'];
		$nguyen_lieu=$_POST['nguyen_lieu'];
		$nguyen_lieu_phu=$_POST['nguyen_lieu_phu'];
		$luot_xem=$_POST['luot_xem'];
		$mo_ta=$_POST['mo_ta'];
		$result=$conn->query("SELECT hinh_anh from thuc_an where ten = '$ten'");
		$row = $result->fetch_assoc();
		 $anh_xoa="../".$row["hinh_anh"];
		if($_FILES['hinh_anh']['error'] == 0){
			$hinh_anh="imags/".$_FILES['hinh_anh']['name'];
			$result=$conn->query("UPDATE thuc_an SET `loai` = '$loai', `nguyen_lieu` = '$nguyen_lieu', `nguyen_lieu_phu` = '$nguyen_lieu_phu', `luot_xem` = '$luot_xem', `hinh_anh` = '$hinh_anh', `mo_ta` = '$mo_ta'  WHERE ten= '$ten'")or die("Lỗi truy vấn");
			if($result){
				unlink($anh_xoa);
				move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../imags/'.$_FILES['hinh_anh']['name']);
				header("location: ../admin.php");
			}
			
		}
		else{
			$result=$conn->query("UPDATE thuc_an SET `loai` = '$loai', `nguyen_lieu` = '$nguyen_lieu', `nguyen_lieu_phu` = '$nguyen_lieu_phu', `luot_xem` = '$luot_xem', `mo_ta` = '$mo_ta'  WHERE ten= '$ten'")or die("Lỗi truy vấn");
			if($result){
				header("location: ../admin.php");
			}
		}

		

			
			
	}
?>