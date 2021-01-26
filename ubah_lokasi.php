<!DOCTYPE html>
<html>
	<head>
		<title>Ubah Lokasi</title>
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
					<li class="nav-item active">
						<a class="nav-link" href="cari_lokasi.php">Lokasi</a>
					</li>
					<li class="nav-item">
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
		<h1>Ubah Lokasi</h1>
		<?php
			include"koneksi.php";
			$id_lokasi=$_GET['id_lokasi'];
			$data=mysqli_query($koneksi,"select * from tb_lokasi where id_lokasi='$id_lokasi'");
			while($d=mysqli_fetch_array($data)){ ?>
				<form action="update_lokasi.php" method="POST">
					<table class="table">
						<tr>
							<td>
								<input type="hidden" name="txt_id_lokasi" value="<?php echo $d['id_lokasi']; ?>">
								<input type="text" name="txt_alamaat" value="<?php echo $d['alamat_lokasi']; ?>">
							</td>
							<td><input type="text" name="txt_longtitude" value="<?php echo $d['longtitude']; ?>"></td>
							<td><input type="text" name="txt_latitude" value="<?php echo $d['latitude']; ?>"></td>
							<td><input type="submit" name="submit" value="Ubah" class="btn btn-primary"></td>
						</tr>
					</table>
				</form>
			<?php }
		?>
	</body>
</html>