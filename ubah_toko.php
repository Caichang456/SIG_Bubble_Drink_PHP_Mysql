<!DOCTYPE html>
<html>
	<head>
		<title>Ubah Toko</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="cari_akun.php">Akun</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cari_lokasi.php">Lokasi</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="cari_toko.php">Toko</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cari_bubble_drink.php">Bubble Drink</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cari_komentar_dan_rating.php">Komentar dan Rating</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Ubah Toko</h1>
		<?php
			include"koneksi.php";
			$id_toko=$_GET['id_toko'];
			$data=mysqli_query($koneksi,"select * from tb_toko as a inner join tb_lokasi as b on a.id_lokasi=b.id_lokasi where id_toko='$id_toko'");
			while($d=mysqli_fetch_array($data)){ ?>
				<form action="update_toko.php" method="POST">
					<table class="table">
						<tr>
							<td>
								<input type="hidden" name="txt_id_toko" value="<?php echo $d['id_toko']; ?>">
								<input type="text" name="txt_nama_toko" value="<?php echo $d['nama_toko']; ?>">
							</td>
							<td>
								<select name="s_lokasi">
									<?php
										$data2=mysqli_query($koneksi,"select * from tb_toko as a inner join tb_lokasi as b on a.id_lokasi=b.id_lokasi");
										while($d2=mysqli_fetch_array($data2)){ ?>
											<option value="<?=$d['id_lokasi']; ?>"><?=$d['nama_lokasi']; ?></option>
										<?php }
									?>
								</select>
							</td>
							<td><input type="text" name="txt_alamat" value="<?php echo $d['alamat']; ?>"></td>
							<td><input type="text" name="txt_nomor_handphone" value="<?php echo $d['nomor_handphone']; ?>"></td>
							<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
						</tr>
					</table>
				</form>
			<?php }
		?>
	</body>
</html>