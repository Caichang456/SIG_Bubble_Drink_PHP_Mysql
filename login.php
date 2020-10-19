<?php
	session_start();
	include "koneksi.php";
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	$blokir=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE blokir='Tidak'");
	if($blokir>0){
		$data=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email' and password='$password'");
		$cek=mysqli_num_rows($data);
		if($cek>0){
			$status=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE status='Admin'");
			$cek2=mysqli_num_rows($status);
			if($cek2>0){
				$_SESSION['txt_email']=$email;
				$_SESSION['txt_password']=$password;
				header("location:cari_akun.php");	
			}
			else{
				$_SESSION['txt_email']=$email;
				$_SESSION['txt_password']=$password;
				header("location:cari_bubble_drink_user.php");
			}
		}
		else{
			header("location:index.php");
		}
	}	
?>