<!DOCTYPE html>
<html>
	<head>
		<title>Ubah Bubble Drink</title>
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
					<li class="nav-item">
						<a class="nav-link" href="cari_toko.php">Toko</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="cari_bubble_drink.php">Bubble Drink</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cari_komentar_dan_rating.php">Komentar dan Rating</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Ubah Bubble Drink</h1>
		<?php
			include"koneksi.php";
			$id_bubble_drink=$_GET['id_bubble_drink'];
			$data=mysqli_query($koneksi,"select * from tb_bubble_drink as a inner join tb_toko as b on a.id_toko=b.id_toko where id_bubble_drink='$id_bubble_drink'");
			while($d=mysqli_fetch_array($data)){ ?>
				<form action="update_bubble_drink.php" method="POST">
					<table class="table">
						<tr>
							<td>
								<input type="hidden" name="txt_id_bubble_drink" value="<?php echo $d['id_bubble_drink']; ?>">
								<input type="text" name="txt_nama_bubble_drink" value="<?php echo $d['nama_bubble_drink']; ?>">
							</td>
							<td>
								<select name="s_toko">
									<?php
										$data2=mysqli_query($koneksi,"select * from tb_bubble_drink as a inner join tb_toko as b on a.id_toko=b.id_toko");
										while($d2=mysqli_fetch_array($data2)){ ?>
											<option value="<?=$d['id_toko']; ?>"><?=$d['nama_toko']; ?></option>
										<?php }
									?>
								</select>
							</td>
							<td><input type="text" name="txt_harga_bubble_drink" value="<?php echo $d['harga_bubble_drink']; ?>"></td>
							<td><input type="text" name="txt_diskon_bubble_drink" value="<?php echo $d['diskon_bubble_drink']; ?>"></td>
							<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
						</tr>
					</table>
				</form>
			<?php }
		?>
	</body>
</html>