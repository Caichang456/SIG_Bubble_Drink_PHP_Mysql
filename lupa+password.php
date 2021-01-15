<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Akun</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
	</head>
	<body>
		<form name="form_daftar" method="POST" action="daftar.php" onsubmit="return validasi()">
			<h1>Daftar Akun</h1>
			<table>
				<tr>
					<td><input type="text" name="txt_email" placeholder="Email"></td>
					<td><input type="text" name="txt_username" placeholder="Username"></td>
				</tr>
				<tr>
					<td><input type="text" name="txt_nama_depan" placeholder="Nama Depan"></td>
					<td><input type="text" name="txt_nama_tengah" placeholder="Nama Tengah"></td>
					<td><input type="text" name="txt_nama_belakang" placeholder="Nama Belakang"></td>
				</tr>
				<tr>
					<td>
						<select name="tanggal_lahir">
							<?php
								for($i=1;$i<=31;$i++){
									echo "<option value=\"$i\">$i</option>";
								}
							?>
						</select>
					</td>
					<td>
						<select name="bulan_lahir">
							<?php
								for($i=1;$i<=12;$i++){
									echo "<option value=\"$i\">$i</option>";
								}
							?>
						</select>
					</td>
					<td>
						<select name="tahun_lahir">
							<?php
								for($i=date('Y');$i>=1;$i--){
									echo "<option value=\"$i\">$i</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<select name="jenis_kelamin">
							<option value="laki-laki">Laki-Laki</option>
							<option value="perempuan">Perempuan</option>
						</select>
					</td>
					<td><input type="text" name="txt_nomor_handphone" placeholder="Nomor Handphone"></td>
				</tr>
				<tr>
					<td><input type="password" name="txt_password" placeholder="Password"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Daftar" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</body>
</html>