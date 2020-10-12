<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Komentar dan Rating</title>
	</head>
	<body>
		<h1>Tambah Komentar dan Rating</h1>
		<?php
			include "koneksi.php";
			$id_komentar=$_GET['id_komentar'];
			$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating");
			while($d=mysqli_fetch_array($data)){ ?>
				<form method="POST" action="tambah_komentar.php">
					<tr>
						<td><input type="text" name="txt_id_komentar" value="<?php echo $d['id_komentar']; ?>"></td>
						<td><input type="text" name="txt_id_lokasi" value="<?php echo $d['id_lokasi']; ?>"></td>
						<td><input type="text" name="txt_id_bubble_drink" value="<?php echo $d['id_bubble_drink']; ?>"></td>
						<td><input type="text" name="txt_rating" value="<?php echo $d['rating']; ?>"></td>
						<td><input type="text" name="txt_komentar_user" value="<?php echo $d['komentar_user']; ?>"></td>
						<td><input type="text" name="txt_komentar_admin" placeholder="Komentar Admin"></td>
						<td><input type="submit" name="submit" value="Tambah"></td>
					</tr>
				</form>
			<?php }
		?>
	</body>
</html>