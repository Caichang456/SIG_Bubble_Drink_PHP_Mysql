<!DOCTYPE html>
<html>
	<head>
		<title>Cari Komentar dan Rating</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<a href="cari_akun.php">Akun</a> |
		<a href="cari_lokasi.php">Lokasi</a> |
		<a href="cari_bubble_drink.php">Bubble Drink</a> |
		<a href="cari_komentar_dan_rating.php">Komentar dan Rating</a> |
		<a href="profil.php">Profil</a>
		<h1>Cari Lokasi</h1>
		<form action="akun.php" action="POST">
			<input type="type" name="txt_cari_komentar_dan_rating" placeholder="Cari Apa?">
			<input type="submit" name="submit" value="Cari">
		</form>
		<table border="1">
			<tr>
				<th>ID Komentar dan Rating</th>
				<th>ID Lokasi</th>
				<th>ID Bubble Drink</th>
				<th>Rating</th>
				<th>Komentar User</th>
				<th>Komentar Admin</th>
				<th>Aksi</th>
			</tr>
			<?php
				include"koneksi.php";
				$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating");
				while($d=mysqli_fetch_array($data)){ ?>
					<tr>
						<td><?php echo $d['id_komentar']; ?></td>
						<td><?php echo $d['id_lokasi']; ?></td>
						<td><?php echo $d['id_bubble_drink']; ?></td>
						<td><?php echo $d['rating']; ?></td>
						<td><?php echo $d['komentar_user']; ?></td>
						<td><?php echo $d['komentar_admin']; ?></td>
						<td>
							<a href="tambah_komentar_dan_rating.php?id_komentar=<?php echo $d['id_komentar']; ?>">Tambah Komentar Admin</a>|
							<a href="ubah_komentar_dan_rating.php?id_komentar=<?php echo $d['id_komentar']; ?>">Ubah Komentar Admin</a>|
							<a href="hapus_komentar_dan_rating.php?id_komentar=<?php echo $d['id_komentar']; ?>">Hapus Komentar Admin</a>
						</td>
					</tr>
				<?php }
			?>
		</table>
	</body>
</html>