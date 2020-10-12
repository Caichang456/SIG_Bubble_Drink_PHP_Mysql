<!DOCTYPE html>
<html>
	<head>
		<title>Ubah Lokasi</title>
	</head>
	<body>
		<h1>Ubah Lokasi</h1>
		<form action="update_lokasi.php" method="POST">
			<tr>
				<td><input type="text" name="txt_id_lokasi" placeholder="ID Lokasi"></td>
				<td><input type="text" name="txt_nama_lokasi" placeholder="Nama Lokasi"></td>
				<td><input type="text" name="txt_alamat" placeholder="Alamat"></td>
				<td><input type="text" name="txt_nomor_handphone" placeholder="Nomor Handphone"></td>
				<td><input type="text" name="txt_longtitude" placeholder="Longtitude"></td>
				<td><input type="text" name="txt_latitude" placeholder="Latitude"></td>
				<td><input type="submit" name="submit" value="Simpan"></td>
			</tr>
		</form>
	</body>
</html>