<!DOCTYPE html>
<html>
	<head>
		<title>Cari Bubble Drink</title>
	</head>
	<body>
		<a href="cari_akun.php">Akun</a> |
		<a href="cari_lokasi.php">Lokasi</a> |
		<a href="cari_bubble_drink.php">Bubble Drink</a> |
		<a href="cari_komentar_dan_rating.php">Komentar dan Rating</a> |
		<a href="logoout.php">Logout</a>
		<h1>Cari Bubble Drink</h1>
		<form method="POST">
			<input type="type" name="txt_cari_bubble_drink" placeholder="Cari Apa?">
			<input type="submit" name="submit" value="Cari">
		</form>
		<a href="tambah_bubble_drink.php">Tambah Bubble Drink</a>
		<table border="1">
			<tr>
				<th>ID Bubble Drink</th>
				<th>ID Lokasi</th>
				<th>Nama Bubble Drink</th>
				<th>Harga</th>
				<th>Diskon</th>
				<th>Aksi</th>
			</tr>
			<?php
				include"koneksi.php";
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['id_bubble_drink']; ?></td>
							<td><?php echo $d['id_lokasi']; ?></td>
							<td><?php echo $d['nama']; ?></td>
							<td><?php echo $d['harga']; ?></td>
							<td><?php echo $d['diskon']; ?></td>
							<td>
								<a href="ubah_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Ubah Bubble Drink</a> |
								<a href="hapus_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Hapus Bubble Drink</a>
							</td>
						</tr>
					<?php } } ?>
				<?php if(isset($_POST['submit'])){
					$cari_bubble_drink=$_POST['txt_cari_bubble_drink'];
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink where nama like'%$cari_bubble_drink%' or harga like'%$cari_bubble_drink%' or diskon like '%$cari_bubble_drink%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['id_bubble_drink']; ?></td>
							<td><?php echo $d['id_lokasi']; ?></td>
							<td><?php echo $d['nama']; ?></td>
							<td><?php echo $d['harga']; ?></td>
							<td><?php echo $d['diskon']; ?></td>
							<td>
								<a href="ubah_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Ubah Bubble Drink</a> |
								<a href="hapus_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Hapus Bubble Drink</a>
							</td>
						</tr>
					<?php } } ?>
		</table>
	</body>
</html>