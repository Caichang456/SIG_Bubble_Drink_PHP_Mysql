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
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating as a inner join tb_bubble_drink as b on a.id_bubble_drink=b.id_bubble_drink inner join tb_user as c on a.id_user=c.id_user");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['id_komentar_dan_rating']; ?></td>
							<td><?php echo $d['nama_bubble_drink']; ?></td>
							<td><?php echo $d['user_name']; ?></td>
							<td><?php echo $d['rating']; ?></td>
							<td><?php echo $d['komentar_user']; ?></td>
						</tr>
					<?php }} ?>
				<?php if(isset($_POST['submit'])){
					$komentar=$_POST['txt_cari_komentar_dan_rating'];
					$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating as a inner join tb_bubble_drink as b on a.id_bubble_drink=b.id_bubble_drink inner join tb_user as c on a.id_user=c.id_user where komentar_user like '%$komentar%' or komentar_admin like '%$komentar%' or rating like '%$komentar%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['id_komentar_dan_rating']; ?></td>
							<td><?php echo $d['nama_bubble_drink']; ?></td>
							<td><?php echo $d['user_name']; ?></td>
							<td><?php echo $d['rating']; ?></td>
							<td><?php echo $d['komentar_user']; ?></td>
						</tr>
					<?php }} ?>
		</table>
	</body>
	<?php
			$data2=mysqli_query($koneksi,"select * from tb_komentar_dan_rating");
			$jmldata=mysqli_num_rows($data2);
			$jmlhalaman=ceil($jmldata/$batas);
		?>
		<div class="text-center">
			<ul class="pagination">
				<?php
					for($i=1;$i<=$jmlhalaman;$i++){
						echo "<li class='page-item'><a class='page-link' href='cari_komentar_dan_rating.php?halaman=$i'>$i</a></li>";
					}
				?>
			</ul>
		</div>
</html>