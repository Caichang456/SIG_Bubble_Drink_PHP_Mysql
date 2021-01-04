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
	if(isset($_POST['simpan_lokasi'])){
		$nama_lokasi=$_POST['nama_lokasi'];
		$alamat=$_POST['txt_alamat'];
		$latitude=$_POST['latitude'];
		$longtitude=$_POST['longtitude'];
		mysqli_query($koneksi,"insert into tb_lokasi(id_lokasi,nama_lokasi,alamat,latitude,longtitude) values('','$nama_lokasi','$alamat','$latitude','$longtitude')");
		header("location:cari_lokasi.php");
	}
	if(isset($_POST['update_bubble_drink'])){
		$id_bubble_drink=$_POST['id_bubble_drink'];
		$nama_bubble_drink=$_POST['txt_nama_bubble_drink'];
		$harga_bubble_drink=$_POST['txt_harga_bubble_drink'];
		$diskon_bubble_drink=$_POST['txt_nama_bubble_drink'];
		$toko=$_POST['s_toko'];
		mysqli_query($koneksi,"update tb_bubble_drink set nama_bubble_drink='$nama_bubble_drink', harga_bubble_drink='$harga_bubble_drink', diskon_bubble_drink='$diskon_bubble_drink' where id_bubble_drink='$id_bubble_drink'");
		header("location:cari_bubble_drink.php");
	}
	if(isset($_POST['update_toko'])){
		$id_toko=$_POST['id_toko'];
		$nama_toko=$_POST['txt_nama_toko'];
		$lokasi=$_POST['s_lokasi'];
		$alamat=$_POST['txt_alamat'];
		$nomor_handphone=$_POST['txt_nomor_handphone'];
		mysqli_query($koneksi,"update tb_toko set nama_toko='$nama_toko', lokasi='$lokasi', alamat='$alamat', $nomor_handphone='$nomor_handphone' where id_toko='$id_toko'");
		header("location:cari_toko.php");
	}
	if(isset($_POST['update_lokasi'])){
		$id_lokasi=$_POST['id_lokasi'];
		$nama_lokasi=$_POST['nama_lokasi'];
		$alamat=$_POST['txt_alamat'];
		$latitude=$_POST['latitude'];
		$longtitude=$_POST['longtitude'];
		mysqli_query($koneksi,"update tb_komentar_dan_rating set nama_lokasi='$nama_lokasi', alamat='$alamat', latitude='$latitude', longtitude='$longtitude' where id_lokasi='$id_lokasi'");
		header("location:cari_lokasi.php");
	}
?>