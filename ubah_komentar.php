<?php
	include "koneksi.php";
	$id_komentar=$_POST['txt_id_komentar'];
	$komentar_user=$_POST['txt_komentar_user'];
	$rating=$_POST['s_rating'];
	mysqli_query($koneksi,"update tb_komentar_dan_rating set komentar_user='$komentar_user', rating='$rating' where id_komentar_dan_rating='$id_komentar_dan_rating'");
	header("location:cari_bubble_drink_user.php");
?>