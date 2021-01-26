<!DOCTYPE html>
<html>
	<head>
		<title>Cari Lokasi</title>
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
				function bindInfoWindow(marker, map, infoWindow, html){
					google.maps.event.addListener(marker, 'click', function(){
						infoWindow.setContent(html);
						infoWindow.open(map, marker);
					});
					google.maps.event.addListener(marker, 'dblclick', function(){
						infoWindow.setContent(html);
						infoWindow.open(map, marker);
						window.location.href = marker.url;
					});
				}
				function addMarker(latitude, longtitude, info){
					var pt = new google.maps.LatLng(latitude, longtitude);
					bounds.extend(pt);
					var marker = new google.maps.Marker({
						map: map,
						position: pt,
					});
					map.fitBounds(bounds);
					bindInfoWindow(marker, map, infoWindow, info);
				}
				<?php
					include "koneksi.php";
					$data=mysqli_query($koneksi,"select * from tb_lokasi");
					while($d=mysqli_fetch_array($data)){
						$alamat_lokasi=$d['alamat_lokasi'];
						$longtitude=$d['longtitude'];
						$latitude=$d['latitude'];
						echo ("addMarker($latitude,$longtitude,'$alamat_lokasi');\n");
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
					<li class="nav-item active">
						<a class="nav-link" href="cari_lokasi.php">Lokasi</a>
					</li>
					<li class="nav-item">
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
		<div id="map-canvas"></div>
		<h1>Cari Lokasi</h1>
		<form method="POST">
			<input type="text" name="txt_cari_lokasi" placeholder="Cari apa?">
			<input class="btn btn-primary" type="submit" name="submit" value="Cari">
		</form>
		<table class="table">
			<tr>
				<th>Alamat Lokasi</th>
				<th>Longtitude</th>
				<th>Latitude</th>
				<th>Aksi</th>
			</tr>
			<form method="POST">
				<tr>
					<th><input type="text" name="txt_alamat_lokasi" placeholder="Alamat Lokasi"></th>
					<th><input type="text" name="txt_longtitude" placeholder="Longtitude"></th>
					<th><input type="text" name="txt_latitude" placeholder="Latitude"></th>
					<th><input class="btn btn-primary" type="submit" name="simpan_lokasi" value="Simpan"></th>
				</tr>
			</form>
			<?php
				include"koneksi.php";
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_lokasi");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d
							['alamat_lokasi']; ?></td>
							<td><?php echo $d['longtitude']; ?></td>
							<td><?php echo $d['latitude']; ?></td>
							<td>
								<a class="btn btn-primary" href="ubah_lokasi.php?id_lokasi=<?php echo $d['id_lokasi']; ?>">Ubah</a>
								<a class="btn btn-danger" href="hapus_lokasi.php?id_lokasi=<?php echo $d['id_lokasi']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
							</td>
						</tr>
					<?php } } ?>
				<?php if(isset($_POST['submit'])){
					$lokasi=$_POST['txt_cari_lokasi'];
					$data=mysqli_query($koneksi,"select * from tb_lokasi where nama_lokasi like '%$lokasi%' or alamat like '%$lokasi%' or nomor_handphone like '%$lokasi%' or longtitude like '%$lokasi%' or latitude like '%$lokasi%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['alamat_lokasi']; ?></td>
							<td><?php echo $d['longtitude']; ?></td>
							<td><?php echo $d['latitude']; ?></td>
							<td>
								<a class="btn btn-primary" href="ubah_lokasi.php?id_lokasi=<?php echo $d['id_lokasi']; ?>">Ubah</a>
								<a class="btn btn-danger" href="hapus_lokasi.php?id_lokasi=<?php echo $d['id_lokasi']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
							</td>
						</tr>
					<?php } }
			?>
			<?php if(isset($_POST['simpan_lokasi'])){
				include"koneksi.php";
		$alamat_lokasi=$_POST['txt_alamat_lokasi'];
		$latitude=$_POST['txt_latitude'];
		$longtitude=$_POST['txt_longtitude'];
		$cek=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_lokasi WHERE longtitude like '$longtitude' AND latitude like '%$latitude%'"));
	if($cek>0){
		echo "Longtitude dan Latitude yang anda masukkan sudah ada di database";
	}
	else{
		echo "Data berhasil di daftar";
		mysqli_query($koneksi,"INSERT INTO tb_lokasi(alamat_lokasi,latitude,longtitude) VALUES('$alamat_lokasi','$latitude','$longtitude')");
		header("location:cari_lokasi.php");
	}
				 }
			?>
		</table>
	</body>
</html>