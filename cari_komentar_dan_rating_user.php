
<!DOCTYPE html>
<html>
	<head>
		<title>Cari Komentar dan Rating User</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="cari_bubble_drink_user.php">Bubble Drink --> Komentar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Cari Komentar dan Rating</h1>
		<a href="tambah_komentar_dan_rating.php">Tambah</a>
		<table class="table">
			<tr>
				<th>Nama Bubble Drink</th>
				<th>Toko</th>
				<th>Rating</th>
				<th>Komentar User</th>
			</tr>
			<?php
				include"koneksi.php";
				$data3=mysqli_query($koneksi,"select * from tb_komentar_dan_rating");
				while($d3=mysqli_fetch_array($data3)){ ?>
					<tr>
						<td><?php echo $d3['id_bubble_drink']; ?></td>
						<td><?php echo $d3['id_toko']; ?></td>
						<td><?php echo $d3['rating']; ?></td>
						<td><?php echo $d3['komentar_user']; ?></td>
					</tr>
				<?php } ?>
		</table>
	</body>
</html>