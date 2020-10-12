<?php
	include"koneksi.php";
	$id_lokasi=$_GET['id_lokasi'];
	mysqli_query($koneksi,"delete from tb_lokasi where id_lokasi='$id_lokasi'");
	header("location:cari_lokasi.php");
?>