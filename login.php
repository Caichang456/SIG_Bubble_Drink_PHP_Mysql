<?php
	session_start();
	include "koneksi.php";
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	$data=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email' and password='$password'");
	$cek=mysqli_num_rows($data);
	if($cek>0){
		header("location:cari_bubble_drink_user.php");
	}
	else{
		header("location:index.php");
	}	
?>