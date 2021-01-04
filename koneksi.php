<?php
	$koneksi=mysqli_connect("localhost","root","","db_sig_bubble_drink");
	if(mysqli_connect_errno()){
		echo "<script type='text/javascript'>
				alert('Gagal koneksi ke database');
			</script>".mysqli_connect_errno();
	}
?>