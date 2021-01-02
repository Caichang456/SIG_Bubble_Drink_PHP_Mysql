<!DOCTYPE html>
<html>
	<head>
		<title>Cari Akun</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="cari_akun.php">Akun</a>
					</li>
					<li class="nav-item">
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
		<h1>Cari Akun</h1>
		<form>
			<input type="text" name="tx+_cari_akun" placeholder="Cari apa?">
			<input type="submit" name="submit" value="Cari" class="btn btn-primary">
		</form>
		<table class="table">
			<tr>
				<th>Email</th>
				<th>Username</th>
				<th>Aksi</th>
			</tr>
			<?php
				include "koneksi.php";
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
					$data=mysqli_query($koneksi,"select * from tb_user");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['email']; ?></td>
							<td><?php echo $d['user_name']; ?></td>
							<td>
								<a class="btn btn-danger" href="blokir_akun.php?id_user=<?php echo $d['id_user']; ?>">Blokir</a>
							</td>
						</tr>
					<?php } } ?>
					<?php if(isset($_POST['submit'])){
						$cari_akun=$_POST['txt_cari_akun'];
						$data=mysqli_query($koneksi,"select * from tb_user where user_name like '%$cari_akun%' or nama_depan like '%$cari_akun%' or nama_tengah like '%$cari_akun%' or nama_belakang like '%$cari_akun%' or hobby like '%$cari_akun%' or tanggal_lahir like '%$cari_akun%' or bulan_lahir like '%$cari_akun%' or tahun_lahir like '%$cari_akun%' or status like '%$cari_akun%'");
						while($d=mysqli_fetch_array($data)){ ?>
							<tr>
								<td><?php echo $d['email']; ?></td>
								<td><?php echo $d['user_name']; ?></td>
								<td>
									<a class="btn btn-danger" href="blokir_akun.php?id_user=<?php echo $d['id_user']; ?>">Blokir</a>
								</td>
						</tr>
					<?php } }?> 
		</table>
		<?php
			$data2=mysqli_query($koneksi,"select * from tb_lokasi");
			$jmldata=mysqli_num_rows($data2);
			$jmlhalaman=ceil($jmldata/$batas);
		?>
		<div class="text-center">
			<ul class="pagination">
				<?php
					for($i=1;$i<=$jmlhalaman;$i++){
						echo "<li class='page-item'><a class='page-link' href='cari_lokasi.php?halaman=$i'>$i</a></li>";
					}
				?>
			</ul>
		</div>
	</body>
</html>