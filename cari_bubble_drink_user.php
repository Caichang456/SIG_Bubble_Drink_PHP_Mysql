<!DOCTYPE html>
<html>
	<head>
		<title>Cari Bubble Drink User</title>
	</head>
	<body>
		<h1>Cari Bubble Drink</h1>
		<form method="POST">
			<table>
				<tr>
					<td><input type="text" name="txt_nama" placeholder="Nama Bubble Drink"></td>
					<td><input type="text" name="txt_harga" placeholder="Harga Bubble Drink"></td>
					<td><input type="text" name="txt_diskon" placeholder="Diskon"></td>
					<td><input type="submit" name="submit" value="Cari Bubble Drink"></td>
				</tr>
			</table>
		</form>
		<table border="1">
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
							<td><a href="detail_bubble_drink.php?id_lokasi=<?php echo $d['id_lokasi']; ?>">Detail Bubble Drink</a></td>
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
							<td><a href="detail_bubble_drink.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Detail Bubble Drink</a></td>
						</tr>
					<?php }
				} ?>
		</table>
	</body>
</html>