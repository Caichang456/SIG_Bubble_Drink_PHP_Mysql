<!DOCTYPE html>
<html>
	<head>
		<title>Cari Bubble Drink</title>
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
						<a class="nav-link" href="cari_bubble_drink.php">Bubble Drink <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cari_komentar_dan_rating.php">Komentar dan Rating</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="profil.php">Profil</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Cari Bubble Drink</h1>
		<form method="POST">
			<input type="text" name="txt_cari_bubble_drink" placeholder="Cari apa?">
		</form>
		<table class="table">
			<tr>
				<th>Nama Toko</th>
				<th>Nama Bubble Drink</th>
				<th>Harga</th>
				<th>Diskon</th>
				<th>Aksi</th>
			</tr>
			<form name="form_bubble_drink" method="POST" onsubmit="return validasi()">
				<tr>
					<th>
						<select name="s_toko">
							<?php
								include"koneksi.php";
								$data=mysqli_query($koneksi,"select * from tb_toko");
								while($d=mysqli_fetch_array($data)){ ?>
									<option value="<?=$d['id_toko']; ?>"><?=$d['nama_toko']; ?></option>
								<?php }
							?>
						</select>
					</th>
					<th><input type="text" name="txt_nama_bubble_drink" placeholder="Nama Bubble Drink"></th>
					<th><input type="text" name="txt_harga" placeholder="Harga"></th>
					<th><input type="text" name="txt_diskon" placeholder="Diskon"></th>
					<th><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></th>
				</tr>
			</form>
			<?php
				include"koneksi.php";
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td>
								<select name="s_toko">
									<?php
										include"koneksi.php";
										$data2=mysqli_query($koneksi,"select * from tb_toko");
										while($d2=mysqli_fetch_array($data2)){?>
											<option value="<?php $d2['id_toko']; ?>"><?php $d2['nama_toko']; ?></option>
										<?php }
									?>
								</select>
							</td>
							<td><input type="text" value="<?php echo $d['nama']; ?>"></td>
							<td><?php echo $d['harga']; ?></td>
							<td><?php echo $d['diskon']; ?></td>
							<td>
								<a class="btn btn-primary" href="ubah_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Ubah</a>
								<a class="btn btn-danger" href="hapus_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Hapus</a>
							</td>
						</tr>
					<?php } } ?>
				<?php if(isset($_POST['submit'])){
					$cari_bubble_drink=$_POST['txt_cari_bubble_drink'];
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink where nama like'%$cari_bubble_drink%' or harga like'%$cari_bubble_drink%' or diskon like '%$cari_bubble_drink%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['nama']; ?></td>
							<td><?php echo $d['harga']; ?></td>
							<td><?php echo $d['diskon']; ?></td>
							<td>
								<a class="btn btn-primary" href="ubah_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Ubah Bubble Drink</a>
								<a class="btn btn-danger" href="hapus_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Hapus Bubble Drink</a>
							</td>
						</tr>
				<?php } } ?>
				<?php
					if(isset($_POST['simpan'])){
						$id_bubble_drink=$_POST['txt_id_bubble_drink'];
						$toko=$_POST['s_lokasi'];
						$nama_bubble_drink=$_POST['txt_nama_bubble_drink'];
						$harga=$_POST['txt_harga'];
						$diskon=$_POST['txt_diskon'];
						mysqli_query($koneksi,"insert into tb_bubble_drink(id_bubble_drink,id_toko,nama,harga,diskon) values('$id_bubble_drink','$toko','nama_bubble_drink','$harga','$diskon')");
						header("location:cari_bubble_drink.php");
					}
				?>
		</table>
	</body>
	<script type="text/javascript">
		function validasi(){
			if(document.forms["form_bubble_drink"])
		}
	</script>
</html>