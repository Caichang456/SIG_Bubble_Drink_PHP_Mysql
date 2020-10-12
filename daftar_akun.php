<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Akun</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<form action="daftar.php" method="POST">
			<h1>Daftar Akun</h1>
			<table>
				<tr>
					<td colspan="3"><input type="text" name="txt_id_user" placeholder="ID User" required="required"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="text" name="txt_email" placeholder="Email" required="required"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="text" name="txt_username" placeholder="Username" required="required"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="text" name="txt_nama_depan" placeholder="Nama Depan" required="required"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="text" name="txt_nama_tengah" placeholder="Nama Tengah" required="required"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="text" name="txt_nama_belakang" placeholder="Nama Belakang" required="required"></td>
				</tr>
				<tr>
					<td colspan="3">
						<select name="jenis_kelamin">
							<option value="laki-laki">Laki-Laki</option>
							<option value="perempuan">Perempuan</option>
						</select>
					</td>
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
					<td colspan="3"><input type="text" name="txt_hobby" placeholder="Hobby" required="required"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="password" name="txt_password" placeholder="Password" required="required"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="btn_daftar" value="Daftar"></td>
				</tr>
			</table>
		</form>
	</body>
</html>