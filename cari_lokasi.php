<!DOCTYPE html>
<html>
	<head>
		<title>Cari Lokasi</title>
	</head>
	<body>
		<a href="cari_akun.php">Akun</a> |
		<a href="cari_lokasi.php">Lokasi</a> |
		<a href="cari_bubble_drink.php">Bubble Drink</a> |
		<a href="cari_komentar_dan_rating.php">Komentar dan Rating</a> |
		<a href="profil.php">Profil</a>
		<h1>Cari Lokasi</h1>
		<form action="akun.php" action="POST">
			<input type="type" name="txt_cari_lokasi" placeholder="Cari Apa?">
			<input type="submit" name="submit" value="Cari">
		</form>
		<a href="tambah_lokasi.php">Tambah Lokasi</a> |
		<a href="peta.php">Peta</a>
		<table border="1">
			<tr>
				<th>ID Lokasi</th>
				<th>Nama Lokasi</th>
				<th>Alamat</th>
				<th>Nomor Handphone</th>
				<th>Longtitude</th>
				<th>Latitude</th>
				<th>Aksi</th>
			</tr>
			<?php
				include"koneksi.php";
				$data=mysqli_query($koneksi,"select * from tb_lokasi");
				while($d=mysqli_fetch_array($data)){ ?>
					<tr>
						<td><?php echo $d['id_lokasi']; ?></td>
						<td><?php echo $d['nama_lokasi']; ?></td>
						<td><?php echo $d['alamat']; ?></td>
						<td><?php echo $d['nomor_handphone']; ?></td>
						<td><?php echo $d['longtitude']; ?></td>
						<td><?php echo $d['latitude']; ?></td>
						<td>
							<a href="ubah_lokasi.php?id_lokasi=<?php echo $d['id_lokasi']; ?>">Ubah Lokasi</a>|
							<a href="hapus_lokasi.php?id_lokasi=<?php echo $d['id_lokasi']; ?>">Hapus Lokasi</a>
						</td>
					</tr>
				<?php }
			?>
		</table>
	</body>
</html>