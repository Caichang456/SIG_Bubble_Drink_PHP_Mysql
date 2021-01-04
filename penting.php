<?php
	include"koneksi.php";
	if(isset($_POST['simpan_bubble_drink'])){
		$nama_bubble_drink=$_POST['txt_nama_bubble_drink'];
		$harga_bubble_drink=$_POST['txt_harga_bubble_drink'];
		$diskon_bubble_drink=$_POST['txt_nama_bubble_drink'];
		$toko=$_POST['s_toko'];
		mysqli_query($koneksi,"insert into tb_bubble_drink(id_bubble_drink,id_toko,nama_bubble_drink,harga_bubble_drink,diskon_bubble_drink) values('','$toko','$nama_bubble_drink','$harga_bubble_drink','$diskon_bubble_drink')");
		header("location:cari_bubble_drink.php");
	}
	if(isset($_POST['simpan_toko'])){
		$nama_toko=$_POST['txt_nama_toko'];
		$lokasi=$_POST['s_lokasi'];
		$alamat=$_POST['txt_alamat'];
		$nomor_handphone=$_POST['txt_nomor_handphone'];
		mysqli_query($koneksi,"insert into tb_toko(id_toko,id_lokasi,nama_toko,alamat,nomor_handphone) values('','$lokasi','$nama_toko','$alamat','$nomor_handphone')");
		header("location:cari_toko.php");
	}
?>