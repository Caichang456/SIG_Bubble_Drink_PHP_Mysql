
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
		<?php
			include"koneksi.php";
			$id_komentar_dan_rating=$_GET['id_komentar_dan_rating'];
			$data2=mysqli_query($koneksi,"select * from tb_komentar_dan_rating as a inner join tb_bubble_drink as b on a.id_bubble_drink=b.id_bubble_drink inner join tb_user as c on a.id_user=c.id_user where id_komentar_dan_rating like '%$id_komentar_dan_rating%'");
			while($d2=mysqli_fetch_array($data2)){ ?>
				<form action="ubah_komentar.php" method="POST">
					<table class="table">
						<tr>
							<td>
								<input type="hidden" name="txt_id_komentar_dan_rating" value="<?php echo $d2['id_komentar_dan_rating']; ?>">
								<input type="text" name="txt_komentar_user" value="<?php echo $d2['komentar_user']; ?>">
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
			<?php }
		?>
	</body>
</html>