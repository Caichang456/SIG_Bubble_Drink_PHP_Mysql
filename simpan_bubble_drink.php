<?php
	include "koneksi.php";
	$id_bubble_drink=$_POST['txt_id_bubble_drink'];
	$toko=$_POST['s_lokasi'];
	$nama_bubble_drink=$_POST['txt_nama_bubble_drink'];
	$harga=$_POST['txt_harga'];
	$diskon=$_POST['txt_diskon'];
	$folder="bubble_drink/$nama_file";
	mysqli_query($koneksi,"insert into tb_bubble_drink(id_bubble_drink,id_toko,nama,harga,diskon) values('$id_bubble_drink','$lokasi','nama_bubble_drink','$harga','$diskon','$nama_file')");
	header("location:cari_bubble_drink.php");
?>