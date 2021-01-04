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
						<a class="nav-link" href="cari_bubble_drink.php">Bubble Drink</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cari_komentar_dan_rating.php">Komentar dan Rating</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Cari Bubble Drink</h1>
		<form method="POST">
			<input type="text" name="txt_cari_bubble_drink" placeholder="Cari apa?">
			<input type="submit" name="submit" value="Cari" class="btn btn-primary">
		</form>
		<table class="table">
			<tr>
				<th>Nama Toko</th>
				<th>Nama Bubble Drink</th>
				<th>Harga</th>
				<th>Diskon</th>
				<th>Aksi</th>
			</tr>
			<form method="POST" action="penting.php">
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
					<th><input type="submit" name="simpan_bubble_drink" value="Simpan" class="btn btn-primary"></th>
				</tr>
			</form>
			<?php
				include"koneksi.php";
				$batas=10;
				$halaman = @$_GET['halaman'];
				if(empty($halaman)){
					$posisi = 0;
					$halaman = 1;
				}
				else{
					$posisi = ($halaman-1) * $batas;
				}
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink");
					while($d=mysqli_fetch_array($data)){ ?>
						<form method="POST" action="penting.php">
							<tr>
								<td>
									<input type="hidden" name="id_bubble_drink" value="<?php echo $d['id_bubble_drink']; ?>">
									<select name="s_toko">
										<?php
											include"koneksi.php";
											$data2=mysqli_query($koneksi,"select * from tb_bubble_drink as a inner join tb_toko as b on a.id_toko=b.id_toko");
											while($d2=mysqli_fetch_array($data2)){?>
												<option value="<?=$d2['id_toko']; ?>"><?=$d2['nama_toko']; ?></option>
											<?php }
										?>
									</select>
								</td>
								<td><input type="text" name="txt_nama_bubble_drink" value="<?php echo $d['nama_bubble_drink']; ?>"></td>
								<td><input type="text" name="txt_harga_bubble_drink" value="<?php echo $d['harga_bubble_drink']; ?>"></td>
								<td><input type="text" name="txt_diskon_bubble_drink" value="<?php echo $d['diskon_bubble_drink']; ?>"></td>
								<td>
									<input class="btn btn-primary" type="submit" name="ubah_bubble_drink" value="Ubah">
									<a class="btn btn-danger" href="hapus_bubble_drink.php?hapus_bubble_drink=<?php echo $d['id_bubble_drink']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
								</td>
							</tr>
						</form>
					<?php } } ?>
				<?php if(isset($_POST['submit'])){
					$cari_bubble_drink=$_POST['txt_cari_bubble_drink'];
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink where nama like'%$cari_bubble_drink%' or harga like'%$cari_bubble_drink%' or diskon like '%$cari_bubble_drink%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<form method="POST" action="penting.php">
							<tr>
								<td>
									<input type="hidden" name="id_bubble_drink" value="<?php echo $d['id_bubble_drink']; ?>">
									<select name="s_toko">
										<?php
											include"koneksi.php";
											$data2=mysqli_query($koneksi,"select * from tb_bubble_drink as a inner join tb_toko as b on a.id_toko=b.id_toko");
											while($d2=mysqli_fetch_array($data2)){?>
												<option value="<?=$d2['id_toko']; ?>"><?=$d2['nama_toko']; ?></option>
											<?php }
										?>
									</select>
								</td>
								<td><input type="text" name="txt_nama_bubble_drink" value="<?php echo $d['nama_bubble_drink']; ?>"></td>
								<td><input type="text" name="txt_harga_bubble_drink" value="<?php echo $d['harga_bubble_drink']; ?>"></td>
								<td><input type="text" name="txt_diskon_bubble_drink" value="<?php echo $d['diskon_bubble_drink']; ?>"></td>
								<td>
									<input class="btn btn-primary" type="submit" name="ubah_bubble_drink" value="Ubah">
									<a class="btn btn-danger" href="hapus_bubble_drink.php?hapus_bubble_drink=<?php echo $d['id_bubble_drink']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
								</td>
							</tr>
						</form>
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
		<?php
			$data2=mysqli_query($koneksi,"select * from tb_bubble_drink");
			$jmldata=mysqli_num_rows($data2);
			$jmlhalaman=ceil($jmldata/$batas);
		?>
		<div class="text-center">
			<ul class="pagination">
				<?php
					for($i=1;$i<=$jmlhalaman;$i++){
						echo "<li class='page-item'><a class='page-link' href='cari_bubble_drink.php?halaman=$i'>$i</a></li>";
					}
				?>
			</ul>
		</div>
	</body>
</html>