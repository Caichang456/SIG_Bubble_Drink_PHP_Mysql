<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Bubble Drink</title>
	</head>
	<body>
		<h1>Tambah Bubble Drink</h1>
		<form action="simpan_bubble_drink.php" method="POST" enctype="multipart/form-data">
			<tr>
				<td><input type="text" name="txt_id_lokasi" placeholder="ID Bubble Drink"></td>
				<td>
					<select name="lokasi">
						<?php
							include"koneksi.php";
							$data=mysqli_query($koneksi,"select * from tb_lokasi");
							while($d=mysqli_fetch_array($data)){ ?>
								<option value="<?php echo $d['id_lokasi']; ?>"><?php echo $d['id_lokasi']; ?></option>
							<?php }
						?>
					</select>
				</td>
				<td><input type="text" name="txt_nama_bubble_drink" placeholder="Nama Bubble Drink"></td>
				<td><input type="text" name="txt_harga" placeholder="Harga"></td>
				<td><input type="text" name="txt_diskon" placeholder="Diskon"></td>
				<td><input type="file" name="gambar_bubble_drink"></td>
				<td><input type="submit" name="submit" value="Simpan"></td>
			</tr>
		</form>
	</body>
</html>