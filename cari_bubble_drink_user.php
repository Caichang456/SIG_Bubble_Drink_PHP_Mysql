<!DOCTYPE html>
<html>
	<head>
		<title>Cari Bubble Drink User</title>
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
					<li class="nav-item">
						<a class="nav-link" href="profil.php">Profile</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Cari Bubble Drink</h1>
		<form method="POST">
			<table class="table">
				<tr>
					<td><input type="text" name="txt_nama" placeholder="Nama Bubble Drink"></td>
					<td><input type="text" name="txt_harga" placeholder="Harga Bubble Drink"></td>
					<td><input type="text" name="txt_diskon" placeholder="Diskon"></td>
					<td><input class="btn btn-primary" type="submit" name="submit" value="Cari Bubble Drink"></td>
				</tr>
			</table>
		</form>
		<table class="table">
			<tr>
				<th>Nama Bubble Drink</th>
				<th>Harga</th>
				<th>Diskon</th>
				<th>Aksi</th>
			</tr>
			<?php
				include "koneksi.php";
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['nama']; ?></td>
							<td><?php echo $d['harga']; ?></td>
							<td><?php echo $d['diskon']; ?></td>
							<td><a class="btn btn-primary" href="detail_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Detail Bubble Drink</a></td>
						</tr>
					<?php }
				} ?>
				<?php if(isset($_POST['submit'])){
					$nama=$_POST['txt_nama'];
					$harga=$_POST['txt_harga'];
					$diskon=$_POST['txt_diskon'];
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink where nama like '%$nama%' or harga like '%$harga%' or diskon like '%$diskon%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['nama']; ?></td>
							<td><?php echo $d['harga']; ?></td>
							<td><?php echo $d['diskon']; ?></td>
							<td><a class="btn btn-primary" href="detail_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Detail Bubble Drink</a></td>
						</tr>
					<?php }
				} ?>
		</table>
	</body>
</html>