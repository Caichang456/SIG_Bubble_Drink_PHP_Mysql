<?php
	include"koneksi.php";
	$id_bubble_drink=$_POST['id_bubble_drink'];
	$nama_bubble_drink=$_POST['txt_nama_bubble_drink'];
	$harga_bubble_drink=$_POST['txt_harga_bubble_drink'];
	$diskon_bubble_drink=$_POST['txt_nama_bubble_drink'];
	$toko=$_POST['s_toko'];
	mysqli_query($koneksi,"update tb_bubble_drink set nama_bubble_drink='$nama_bubble_drink', harga_bubble_drink='$harga_bubble_drink', diskon_bubble_drink='$diskon_bubble_drink' where id_bubble_drink='$id_bubble_drink'");
	header("location:cari_bubble_drink.php");
?>