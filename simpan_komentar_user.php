<?php
	include "koneksi.php";
	$id_komentar=$_POST['txt_id_komentar'];
	$bubble_drink=$_POST['bubble_drink'];
	$lokasi=$_POST['lokasi'];
	$rating=$_POST['rating'];
	$komentar_user=$_POST['txt_komentar_user'];
	mysqli_query($koneksi,"insert into tb_komentar_dan_rating(id_komentar,id_bubble_drink,id_lokasi,rating,komentar_user) values('$id_komentar','$bubble_drink','$lokasi','$rating','$komentar_user')");
	header("location:cari_bubble_drink_user.php");
?>