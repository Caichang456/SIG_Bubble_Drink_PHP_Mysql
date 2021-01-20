<!DOCTYPE html>
<html>
	<head>
		<title>Ubah Komentar dan Rating</title>
	</head>
	<body>
		<h1>Ubah Komentar dan Rating</h1>
		<?php
			include "koneksi.php";
			$id_komentar_dan_user=$_GET['id_komentar_dan_rating'];
			$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating");
			while($d=mysqli_fetch_array($data)){ ?>
				<form method="POST" action="ubah_komentar_2.php">
					<tr>
						<td><input type="text" name="txt_id_komentar" value="<?php echo $d['id_komentar']; ?>"></td>
						<td><input type="text" name="txt_komentar_user" value="<?php echo $d['komentar_user']; ?>"></td>
						<td><input type="submit" name="submit" value="ubah"></td>
					</tr>
				</form>
			<?php }
		?>
	</body>
</html>