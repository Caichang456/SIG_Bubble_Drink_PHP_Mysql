<?php
	include"koneksi.php";
	$email=$_POST['txt_email'];
	$username=$_POST['txt_username'];
	$password=$_POST['txt_password'];
	$nama_depan=$_POST['txt_nama_depan'];
	$nama_tengah=$_POST['txt_nama_tengah'];
	$nama_belakang=$_POST['txt_nama_belakang'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$bulan_lahir=$_POST['bulan_lahir'];
	$tahun_lahir=$_POST['tahun_lahir'];
	$nomor_handphone=$_POST['txt_nomor_handphone'];
	$cek=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email like '$email' or user_name like '$username'"));
	if($cek>0){
		echo "Email atau Username yang anda masukkan sudah ada di database";
	}
	else{
		mysqli_query($koneksi,"INSERT INTO tb_user(email,user_name,nama_depan,nama_tengah,nama_belakang,password,tanggal_lahir,bulan_lahir,tahun_lahir,nomor_handphone,jenis_kelamin,blokir) VALUES('$email','$username','$nama_depan','$nama_tengah','$nama_belakang','$password','$tanggal_lahir','$bulan_lahir','$tahun_lahir','$nomor_handphone','$jenis_kelamin','Tidak')");
		echo "Data berhasil di daftar";
		header("location:index.php");
	}
?>