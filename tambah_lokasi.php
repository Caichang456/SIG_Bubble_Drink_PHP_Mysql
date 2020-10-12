<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Lokasi</title>
	</head>
	<body>
		<h1>Tambah Lokasi</h1>
		<form action="simpan_lokasi.php" method="POST">
			<tr>
				<td><input type="text" name="txt_id_lokasi" placeholder="ID Lokasi"></td>
			</tr>
			<tr>
				<td><input type="text" name="txt_nama_lokasi" placeholder="Nama Lokasi"></td>
			</tr>
			<tr>
				<td><input type="text" name="txt_alamat" placeholder="Alamat"></td>
			</tr>
			<tr>
				<td><input type="text" name="txt_nomor_handphone" placeholder="Nomor Handphone"></td>
			</tr>
			<tr>
				<td><input type="text" name="txt_longtitude" placeholder="Longtitude"></td>
			</tr>
			<tr>
				<td><input type="text" name="txt_latitude" placeholder="Latitude"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Simpan"></td>
			</tr>
		</form>
	</body>
</html>