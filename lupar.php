<?php
	include"koneksi.php";
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	$status=$_POST['status'];
	$cek=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email'"));
	if($cek>0){
		echo "<script type='text/javascript'>
				alert('Email atau Username yang anda masukkan sudah ada di database');
			</script>";
	}
	else{
		mysqli_query($koneksi,"update tb_user set password='$password' where email='$email'");
		echo "<script type='text/javascript'>
				alert('Data berhasil di reset');
			</script>";
		header("location:index.php");
	}
?>