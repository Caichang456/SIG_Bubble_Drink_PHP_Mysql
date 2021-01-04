<!DOCTYPE html>
<html>
	<head>
		<title>Cari Komentar dan Rating</title>
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
					<li class="nav-item">
						<a class="nav-link" href="cari_bubble_drink.php">Bubble Drink</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="cari_komentar_dan_rating.php">Komentar dan Rating</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Cari Komentar dan Rating</h1>
		<form method="POST">
			<input type="type" name="txt_cari_komentar_dan_rating" placeholder="Cari Apa?">
			<input type="submit" name="submit" value="Cari" class="btn btn-primary">
		</form>
		<table class="table">
			<tr>
				<th>ID Komentar dan Rating</th>
				<th>ID Bubble Drink</th>
				<th>ID User</th>
				<th>Rating</th>
				<th>Komentar User</th>
				<th>Aksi</th>
			</tr>
			<?php
				include"koneksi.php";
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['id_komentar_dan_rating']; ?></td>
							<td><?php echo $d['id_bubble_drink']; ?></td>
							<td><?php echo $d['id_user']; ?></td>
							<td><?php echo $d['rating']; ?></td>
							<td><?php echo $d['komentar_user']; ?></td>
							<td>
								<a class="btn btn-danger" href="hapus_komentar_dan_rating.php?id_komentar_dan_rating=<?php echo $d['id_komentar_dan_rating']; ?>">Hapus</a>
							</td>
						</tr>
					<?php }} ?>
				<?php if(isset($_POST['submit'])){
					$komentar=$_POST['txt_cari_komentar_dan_rating'];
					$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating where komentar_user like '%$komentar%' or komentar_admin like '%$komentar%' or rating like '%$komentar%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['id_komentar_dan_rating']; ?></td>
							<td><?php echo $d['id_bubble_drink']; ?></td>
							<td><?php echo $d['id_user']; ?></td>
							<td><?php echo $d['rating']; ?></td>
							<td><?php echo $d['komentar_user']; ?></td>
							<td>
								<a class="btn btn-danger" href="hapus_komentar_dan_rating.php?id_komentar_dan_rating=<?php echo $d['id_komentar_dan_rating']; ?>">Hapus</a>
							</td>
						</tr>
					<?php }} ?>
		</table>
	</body>
</html>