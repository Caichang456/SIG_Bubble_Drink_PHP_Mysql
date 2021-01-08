<?php
	include"koneksi.php";
	$id_lokasi=$_POST['id_lokasi'];
	$nama_lokasi=$_POST['nama_lokasi'];
	$alamat=$_POST['txt_alamat'];
	$latitude=$_POST['latitude'];
	$longtitude=$_POST['longtitude'];
	mysqli_query($koneksi,"update tb_komentar_dan_rating set nama_lokasi='$nama_lokasi', alamat='$alamat', latitude='$latitude', longtitude='$longtitude' where id_lokasi='$id_lokasi'");
	header("location:cari_lokasi.php");
?>