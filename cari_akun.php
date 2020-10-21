<!DOCTYPE html>
<html>
	<head>
		<title>Cari Akun</title>
	</head>
	<body>
		<a href="cari_akun.php">Akun</a> |
		<a href="cari_lokasi.php">Lokasi</a> |
		<a href="cari_bubble_drink.php">Bubble Drink</a> |
		<a href="cari_komentar_dan_rating.php">Komentar dan Rating</a> |
		<a href="logout.php">Logout</a>
		<h1>Cari Akun</h1>
		<form method="POST">
			<input type="type" name="txt_cari_akun" placeholder="Cari Apa?">
			<input type="submit" name="submit" value="Cari">
		</form>
		<table border="1">
			<tr>
				<th>ID Akun</th>
				<th>Username</th>
				<th>Nama Depan</th>
				<th>Nama Tengah</th>
				<th>Nama Belakang</th>
				<th>Hobby</th>
				<th colspan="3">Tanggal Lahir</th>
				<th>Blokir</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
			<?php
				include "koneksi.php";
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_user");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['id_user']; ?></td>
							<td><?php echo $d['user_name']; ?></td>
							<td><?php echo $d['nama_depan']; ?></td>
							<td><?php echo $d['nama_tengah']; ?></td>
							<td><?php echo $d['nama_belakang']; ?></td>
							<td><?php echo $d['hobby']; ?></td>
							<td><?php echo $d['tanggal_lahir']; ?></td>
							<td><?php echo $d['bulan_lahir']; ?></td>
							<td><?php echo $d['tahun_lahir']; ?></td>
							<td><?php echo $d['blokir']; ?></td>
							<td><?php echo $d['status']; ?></td>
							<td>
								<a href="blokir_akun.php?id_user=<?php echo $d['id_user']; ?>">Blokir</a>
							</td>
						</tr>
					<?php } } ?>
					<?php if(isset($_POST['submit'])){
						$cari_akun=$_POST['txt_cari_akun'];
						$data=mysqli_query($koneksi,"select * from tb_user where user_name like '%$cari_akun%' or nama_depan like '%$cari_akun%' or nama_tengah like '%$cari_akun%' or nama_belakang like '%$cari_akun%' or hobby like '%$cari_akun%' or tanggal_lahir like '%$cari_akun%' or bulan_lahir like '%$cari_akun%' or tahun_lahir like '%$cari_akun%' or status like '%$cari_akun%'");
						while($d=mysqli_fetch_array($data)){ ?>
							<tr>
								<td><?php echo $d['id_user']; ?></td>
								<td><?php echo $d['user_name']; ?></td>
								<td><?php echo $d['nama_depan']; ?></td>
								<td><?php echo $d['nama_tengah']; ?></td>
								<td><?php echo $d['nama_belakang']; ?></td>
								<td><?php echo $d['hobby']; ?></td>
								<td><?php echo $d['tanggal_lahir']; ?></td>
								<td><?php echo $d['bulan_lahir']; ?></td>
								<td><?php echo $d['tahun_lahir']; ?></td>
								<td><?php echo $d['blokir']; ?></td>
								<td><?php echo $d['status']; ?></td>
								<td>
									<a href="blokir_akun.php?id_user=<?php echo $d['id_user']; ?>">Blokir</a>
								</td>
						</tr>
					<?php } }?> 
		</table>
	</body>
</html>