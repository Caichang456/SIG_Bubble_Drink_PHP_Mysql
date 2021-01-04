<!DOCTYPE html>
<html>
	<head>
		<title>Cari Toko</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
		<style type="text/css">
			#map-canvas{
				width: 100%;
				height: 500px;
			}
		</style>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiTYo0s-mGdijeuL6BfruBt3T_FG4o9wM&callback=initialize" async defer></script>
		<script type="text/javascript">
			var marker;
			function initialize(){
				var mapCanvas=document.getElementById('map-canvas');
				var mapOptions={
					mapsTypeId:google.maps.MapTypeId.ROADMAP,
					zoom:9
				}
				var map = new google.maps.Map(mapCanvas, mapOptions);
				var infoWindow = new google.maps.InfoWindow();
				var bounds = new google.maps.LatLngBounds();
				function addMarker(latitude, longtitude, info){
					var pt = new google.maps.LatLng(latitude, longtitude);
					bounds.extend(pt);
					var marker = new google.maps.Marker({
						map: map,
						position: pt
					});
					map.fitBounds(bounds);
					bindInfoWindow(marker, map, infoWindow, info);
				}
				function bindInfoWindow(marker, map, infoWindow, html){
					google.maps.event.addListener(marker, 'click', function(){
						infoWindow.setContent(html);
						infoWindow.open(map, marker);
					});
				}// https://invoice.xendit.co/od/21-day-rapid-sales-program
				<?php
					include "koneksi.php";
					$data=mysqli_query($koneksi,"select * from tb_lokasi as a inner join tb_toko as b on a.id_lokasi=b.id_lokasi");
					while($d=mysqli_fetch_array($data)){
						$nama_lokasi=$d['nama_lokasi'];
						$alamat=$d['alamat'];
						$longtitude=$d['longtitude'];
						$latitude=$d['latitude'];
						echo ("addMarker($latitude,$longtitude,'$nama_lokasi');\n");
					}
				?>
				google.maps.event.addDomListener(window, 'load', initialize);
			}
		</script>
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
					<li class="nav-item active">
						<a class="nav-link" href="cari_toko.php">Toko</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cari_bubble_drink.php">Bubble Drink</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cari_komentar_dan_rating.php">Komentar dan Rating</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Cari Toko</h1>
		<form method="POST">
			<input type="text" name="txt_cari_lokasi" placeholder="Cari apa?">
			<input class="btn btn-primary" type="submit" name="submit" value="Cari">
		</form>
		<table class="table">
			<tr>
				<th>Nama Toko</th>
				<th>Nama Lokasi</th>
				<th>Alamat</th>
				<th>Nomor Handphone</th>
				<th>Aksi</th>
			</tr>
			<form method="POST" action="penting.php">
				<tr>
					<td><input type="text" name="txt_nama_toko" placeholder="Nama Toko"></td>
					<td>
						<select name="s_lokasi">
							<?php
								include"koneksi.php";
								$data2=mysqli_query($koneksi,"select * from tb_lokasi");
								while($d2=mysqli_fetch_array($data2)){ ?>
									<option value="<?=$d2['id_lokasi'] ?>"><?=$d2['nama_lokasi'] ?></option>
								<?php }
							?>
						</select>
					</td>
					<th><input type="text" name="txt_alamat" placeholder="Alamat"></th>
					<th><input type="text" name="txt_nomor_handphone" placeholder="Nomor Handphone"></th>
					<th><input class="btn btn-primary" type="submit" name="simpan_toko" value="Simpan"></th>
				</tr>
			</form>
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
					$data=mysqli_query($koneksi,"select * from tb_toko");
					while($d=mysqli_fetch_array($data)){ ?>
						<form method="POST" action="penting.php">
							<tr>
								<td>
									<input type="hidden" name="txt_id_toko" value="<?php echo $d['id_toko']; ?>">
									<input type="text" name="txt_nama_toko" value="<?php echo $d['nama_toko']; ?>">	
								</td>
								<td>
									<select name="s_lokasi">
										<?php
											include"koneksi.php";
											$data2=mysqli_query($koneksi,"select * from tb_lokasi");
											while($d2=mysqli_fetch_array($data2)){ ?>
												<option value="<?=$d2['id_lokasi'];?>"><?=$d2['nama_lokasi'];?></option>
											<?php }
										?>
									</select>
								</td>
								<th><input type="text" name="txt_alamat" value="<?php echo $d['alamat']; ?>"></th>
								<td><input type="text" name="txt_nomor_handphone" value="<?php echo $d['nomor_handphone']; ?>"></td>
								<td>
									<input class="btn btn-primary" type="submit" name="ubah_toko" value="Ubah">
									<a class="btn btn-danger" href="hapus_toko.php?id_toko=<?php echo $d['id_toko']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
								</td>
							</tr>
						</form>
					<?php } } ?>
				<?php if(isset($_POST['submit'])){
					$lokasi=$_POST['txt_cari_lokasi'];
					$data=mysqli_query($koneksi,"select * from tb_toko where nama_toko like '%$lokasi%' or nomor_handphone like '%$lokasi%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<form method="POST" action="penting.php">
							<tr>
								<td>
									<input type="hidden" name="txt_id_toko" value="<?php echo $d['id_toko']; ?>">
									<input type="text" name="txt_nama_toko" value="<?php echo $d['nama_toko']; ?>">	
								</td>
								<td>
									<select name="s_lokasi">
										<?php
											include"koneksi.php";
											$data2=mysqli_query($koneksi,"select * from tb_lokasi");
											while($d2=mysqli_fetch_array($data2)){ ?>
												<option value="<?=$d2['id_lokasi'];?>"><?=$d2['nama_lokasi'];?></option>
											<?php }
										?>
									</select>
								</td>
								<th><input type="text" name="txt_alamat" value="<?php echo $d['alamat']; ?>"></th>
								<td><input type="text" name="txt_nomor_handphone" value="<?php echo $d['nomor_handphone']; ?>"></td>
								<td>
									<input class="btn btn-primary" type="submit" name="ubah_toko" value="Ubah">
									<a class="btn btn-danger" href="hapus_toko.php?id_toko=<?php echo $d['id_toko']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
								</td>
							</tr>
						</form>
					<?php } }

			?>
		</table>
		<?php
			$data2=mysqli_query($koneksi,"select * from tb_toko");
			$jmldata=mysqli_num_rows($data2);
			$jmlhalaman=ceil($jmldata/$batas);
		?>
		<div class="text-center">
			<ul class="pagination">
				<?php
					for($i=1;$i<=$jmlhalaman;$i++){
						echo "<li class='page-item'><a class='page-link' href='cari_toko.php?halaman=$i'>$i</a></li>";
					}
				?>
			</ul>
		</div>
		<div id="map-canvas"></div>
	</body>
</html>