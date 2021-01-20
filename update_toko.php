<?php
	include"koneksi.php";
	$id_toko=$_POST['txt_id_toko'];
	$nama_toko=$_POST['txt_nama_toko'];
	$lokasi=$_POST['s_lokasi'];
	$alamat=$_POST['txt_alamat'];
	$nomor_handphone=$_POST['txt_nomor_handphone'];
	mysqli_query($koneksi,"update tb_toko set nama_toko='$nama_toko', id_lokasi='$lokasi', alamat_toko='$alamat', $nomor_handphone='$nomor_handphone' where id_toko='$id_toko'");
	header("location:cari_toko.php");
?>