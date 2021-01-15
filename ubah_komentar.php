<?php
	include "koneksi.php";
	$id_komentar=$_POST['txt_id_komentar'];
	$komentar_user=$_POST['txt_komentar_user'];
	mysqli_query($koneksi,"update tb_komentar_dan_rating set komentar_user='$komentar_user' where id_komentar_dan_rating='$id_komentar_dan_rating'");
	header("location:cari_komentar_dan_rating.php");
?>