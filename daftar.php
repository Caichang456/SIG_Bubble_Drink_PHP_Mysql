<?php
	include"koneksi.php";
	$id_user=$_POST['txt_id_user'];
	$email=$_POST['txt_email'];
	$username=$_POST['txt_username'];
	$password=$_POST['txt_password'];
	$cek=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email' or nama_unik='$username'"));
	if($cek>0){
		echo "Email atau Username yang anda masukkan sudah ada di database";
	}
	else{
		mysqli_query($koneksi,"INSERT INTO tb_user(id_user,email,nama_unik,password,blokir) VALUES('$id_user','$email','$username','$password','Tidak')");
		echo "Data berhasil di daftar";
		header("location:index.php");
	}
?>