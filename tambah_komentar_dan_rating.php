<?php
	include"koneksi.php";
?>
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
				<form action="ubah_komentar.php" method="POST">
					<table class="table">
						<tr>
							<td>
								<input type="text" name="txt_komentar_user" placeholder="Komentar User">
							</td>
							<td>
								<select name="s_toko">
									<?php
										$data3=mysqli_query($koneksi,"select * from tb_toko");
										while($d3=mysqli_fetch_array($data3)){ ?>
											<option value="<?php echo $d3['id_toko']; ?>"><?php echo $d3['nama_toko']; ?></option>
										<?php }
									?>
								</select>
							</td>
							<td>
								<select name="s_bubble_drink">
									<?php
										$data4=mysqli_query($koneksi,"select * from tb_bubble_drink");
										while($d4=mysqli_fetch_array($data4)){ ?>
											<option value="<?php echo $d4['id_bubble_drink']; ?>"><?php echo $d4['nama_bubble_drink']; ?></option>
										<?php }
									?>
								</select>
							</td>
							<td>
								<select name="s_rating">
									<?php
										for($indeks=1;$indeks<=5;$indeks++){
											echo "<option value=\"$indeks\">$indeks</option>";
										}
									?>
								</select>
							</td>
							<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
						</tr>
					</table>
				</form>
			
	</body>
</html>