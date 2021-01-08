<?php
	include"koneksi.php";
	$id_bubble_drink=$_GET['id_bubble_drink'];
	mysqli_query($koneksi,"delete from tb_bubble_drink where id_bubble_drink='$id_bubble_drink'");
	header("location:cari_bubble_drink.php");
?>