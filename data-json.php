<?php
	header('Content-Type: application/json; charset=utf8');
	//panggil koneksi.php
	include("koneksi.php");

	$sql="SELECT * FROM tb_lokasi";
	$query=mysql_query($sql) or die(mysql_error());

	$array=array();
	while($data=mysql_fetch_assoc($query)) $array[]=$data;	
	
	echo json_encode($array);
?>