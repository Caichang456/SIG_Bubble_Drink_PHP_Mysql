<?php
	include "koneksi.php";
	$id_komentar=$_GET['id_komentar'];
	mysqli_query($koneksi,"delete from tb_komentar_dan_rating where id_komentar='$id_komentar'");
	header("location:cari_komentar_dan_rating.php");
?>