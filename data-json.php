<?php
	header('Content-Type: application/json; charset=utf8');
	//panggil koneksi.php
	include("koneksi.php");

	$sql="SELECT * FROM tb_lokasi";
	$query=mysqli_query($koneksi,$sql);

	$array=array();
	while($data=mysqli_fetch_assoc($query)) $array[]=$data;	
	
	echo json_encode($array);
?>