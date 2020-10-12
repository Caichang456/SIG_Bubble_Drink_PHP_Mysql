<?php
	include"koneksi.php";
	$id_user=$_GET['id_user'];
	mysqli_query($koneksi,"update tb_user set blokir='Iya' where id_user='$id_user'");
	header("location:cari_akun.php");
?>