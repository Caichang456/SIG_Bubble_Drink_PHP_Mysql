<!DOCTYPE html>
<html>
	<head>
		<title>Profil</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="cari_bubble_drink_user.php">Bubble Drink --> Lokasi</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="profil.php">Profil</a>
					</li>
				</ul>
			</div>
		</nav>
		<form name="form_daftar" method="POST" action="daftar.php" onsubmit="return validasi()">
			<h1>Profile</h1>
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
		<a class="btn btn-danger" href="logout.php">Logout</a>
	</body>
	<script type="text/javascript">
		function validasi(){
			if(document.forms["form_daftar"]["txt_email"].value==""){
				alert("Email Tidak Boleh Kosong");
				document.forms["form_daftar"]["txt_email"].focus();
				return false;
			}
			if(document.forms["form_daftar"]["txt_username"].value==""){
				alert("Username Tidak Boleh Kosong");
				document.forms["form_daftar"]["txt_username"].focus();
				return false;
			}
			if(document.forms["form_daftar"]["txt_nama_depan"].value==""){
				alert("Nama Depan Tidak Boleh Kosong");
				document.forms["form_daftar"]["txt_nama_depan"].focus();
				return false;
			}
			if(document.forms["form_daftar"]["txt_nama_tengah"].value==""){
				alert("Nama Tengah Tidak Boleh Kosong");
				document.forms["form_daftar"]["txt_email"].focus();
				return false;
			}
			if(document.forms["form_daftar"]["txt_nama_belakang"].value==""){
				alert("Nama Belakang Tidak Boleh Kosong");
				document.forms["form_daftar"]["txt_nama_belakang"].focus();
				return false;
			}
			if(document.forms["form_daftar"]["txt_nomor_handphone"].value==""){
				alert("Nomor Handphone Tidak Boleh Kosong");
				document.forms["form_daftar"]["txt_nomor_handphone"].focus();
				return false;
			}
		}
	</script>
</html>