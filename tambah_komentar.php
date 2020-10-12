<?php
	include "koneksi.php";
	$id_komentar=$_POST['txt_id_komentar'];
	$komentar_admin=$_POST['txt_komentar_admin'];
	mysqli_query($koneksi,"update tb_komentar_dan_rating set komentar_admin='$komentar_admin' where id_komentar='$id_komentar'");
	header("location:cari_komentar_dan_rating.php");
?>