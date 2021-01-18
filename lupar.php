<?php
	include"koneksi.php";
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	$cek=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email'"));
	if($cek>0){
		mysqli_query($koneksi,"update tb_user set password='$password' where email='$email'");
		echo "Data berhasil di reset";
		header("location:index.php");
	}
	else{
		echo "Email atau Username yang anda masukkan sudah ada di database";
	}
?>