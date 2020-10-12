<?php
	include "koneksi.php";
	$id_bubble_drink=$_POST['txt_id_bubble_drink'];
	$lokasi=$_POST['lokasi'];
	$nama_bubble_drink=$_POST['txt_nama_bubble_drink'];
	$harga=$_POST['txt_harga'];
	$diskon=$_POST['txt_diskon'];
	$lokasi_file=$_FILES['gambar_bubble_drink']['tmp_name'];
	$nama_file=$_FILES['gambar_bubble_drink']['name'];
	$folder="bubble_drink/$nama_file";
	if(move_uploaded_file($lokasi_file, "$folder")){
		mysqli_query($koneksi,"insert into tb_bubble_drink(id_bubble_drink,id_lokasi,nama,harga,diskon,nama_file) values('$id_bubble_drink','$lokasi','nama_bubble_drink','$harga','$diskon','$nama_file')");
		header("location:cari_bubble_drink.php");
	}
	else{
		alert("Gagal disimpan");
	}
?>