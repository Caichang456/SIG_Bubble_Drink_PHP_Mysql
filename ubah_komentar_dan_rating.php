<!DOCTYPE html>
<html>
	<head>
		<title>Ubah Komentar dan Rating</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
	</head>
	<body>
		<h1>Ubah Komentar dan Rating</h1>
		<?php
			include "koneksi.php";
			$id_komentar_dan_rating=$_GET['id_komentar_dan_rating'];
			$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating where id_komentar_dan_rating='$id_komentar_dan_rating'");
			while($d=mysqli_fetch_array($data)){ ?>
				<form method="POST" action="ubah_komentar.php">
					<tr>
						<td><input type="hidden" name="txt_id_komentar" value="<?php echo $d['id_komentar_dan_rating']; ?>"></td>
						<td><input type="text" name="txt_komentar_user" value="<?php echo $d['komentar_user']; ?>"></td>
						<td><input type="submit" name="submit" value="ubah"></td>
					</tr>
				</form>
			<?php }
		?>
	</body>
</html>