
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
		<table class="table">
			<tr>
				<th>ID Bubble Drink</th>
				<th>ID User</th>
				<th>Rating</th>
				<th>Komentar User</th>
				<th>Aksi</th>
			</tr>
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
				$id_bubble_drink=$_GET['id_bubble_drink'];
				$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating as a inner join tb_bubble_drink as b on a.id_bubble_drink=b.id_bubble_drink inner join tb_user as c on a.id_user=c.id_user");
				while($d=mysqli_fetch_array($data)){ ?>
					<tr>
						<td><?php echo $d['nama_bubble_drink']; ?></td>
						<td><?php echo $d['user_name']; ?></td>
						<td><?php echo $d['rating']; ?></td>
						<td><?php echo $d['komentar_user']; ?></td>
						<td><a href="tambah_komentar_dan_rating.php?id_komentar_dan_rating=<?php echo $d['id_komentar_dan_rating']; ?>">Tambah</a></td>
					</tr>
				<?php } ?>
		</table>
	</body>
</html>