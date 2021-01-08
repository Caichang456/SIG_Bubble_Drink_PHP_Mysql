<?php
	session_start();
	if(!isset($_SESSION['txt_email'])){
		echo"Belum login";
		exit;
	}
	$email=$_SESSION['txt_email'];
	$user_name=$_SESSION['txt_user_name'];
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
		<?php
			include"koneksi.php";
			$id_komentar_dan_rating=$_GET['id_komentar_dan_rating'];
			$data=mysqli_query($koneksi,"select * from tb_komentar_dan_rating where id_komentar_dan_rating='$id_komentar_dan_rating'");
			while($d=mysqli_fecth_array($data)){ ?>
				<form action="tambah_komentar.php" method="POST">
					<table class="table">
						<tr>
							<td>
								<input type="hidden" name="txt_id_komentar_dan_rating" value="<?php echo $d['id_komentar_dan_rating']; ?>">
								<input type="hidden" name="txt_komentar_user" value="<?php echo $d['komentar_user']; ?>">
							</td>
							<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
						</tr>
					</table>
				</form>
			<?php }
		?>
	</body>
</html>