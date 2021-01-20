<?php
	include "koneksi.php";
	$komentar_user=$_POST['txt_komentar_user'];
	$rating=$_POST['s_rating'];
	$toko=$_POST['s_toko'];
	mysqli_query($koneksi,"INSERT INTO tb_komentar_dan_rating(id_toko,rating,komentar_user) VALUES('$toko','$rating','$komentar_user')");
	header("location:cari_bubble_drink_user.php");
?>