<?php
	$koneksi=mysqli_connect("localhost","root","","db_sig_bubble_drink");
	if(mysqli_connect_errno()){
		echo "Koneksi ke database gagal".mysqli_connect_errno();
	}
?>