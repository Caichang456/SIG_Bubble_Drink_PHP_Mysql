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
				<th>Nama Bubble Drink</th>
				<th>Rating</th>
				<th>Komentar User</th>
			</tr>
			<?php
				include"koneksi.php";
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating as a inner join tb_bubble_drink as b on a.id_bubble_drink=b.id_bubble_drink");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['nama_bubble_drink']; ?></td>
							<td><?php echo $d['rating']; ?></td>
							<td><?php echo $d['komentar_user']; ?></td>
						</tr>
					<?php }} ?>
				<?php if(isset($_POST['submit'])){
					$komentar=$_POST['txt_cari_komentar_dan_rating'];
					$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating as a inner join tb_bubble_drink as b on a.id_bubble_drink=b.id_bubble_drink where komentar_user like '%$komentar%' or rating like '%$komentar%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['nama_bubble_drink']; ?></td>
							<td><?php echo $d['rating']; ?></td>
							<td><?php echo $d['komentar_user']; ?></td>
						</tr>
					<?php }} ?>
		</table>
	</body>
</html>