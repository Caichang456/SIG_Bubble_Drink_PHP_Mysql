<?php
	include "koneksi.php";
	$id_komentar=$_POST['txt_id_komentar'];
	$komentar_user=$_POST['txt_komentar_user'];
	mysqli_query($koneksi,"update tb_komentar_dan_rating set komentar_user='$komentar_user' where id_komentar='$id_komentar'");
	header("location:cari_bubble_drink_user.php");
?>