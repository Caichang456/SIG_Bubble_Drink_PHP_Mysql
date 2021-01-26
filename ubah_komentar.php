<?php
	include "koneksi.php";
	$bubble_drink=$_POST['s_bubble_drink'];
	$komentar_user=$_POST['txt_komentar_user'];
	$rating=$_POST['s_rating'];
	$toko=$_POST['s_toko'];
	mysqli_query($koneksi,"INSERT INTO tb_komentar_dan_rating(id_bubble_drink,id_toko,rating,komentar_user) VALUES('$bubble_drink',$toko','$rating','$komentar_user')");
	header("location:cari_komentar_dan_rating_user.php");
?>