<?php
	include"koneksi.php";
	$id_toko=$_GET['id_toko'];
	mysqli_query($koneksi,"delete from tb_toko where id_toko='$id_toko'");
	header("location:cari_bubble_drink.php");
?>