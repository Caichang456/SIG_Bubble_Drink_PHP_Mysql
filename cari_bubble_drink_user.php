
<!DOCTYPE html>
<html>
	<head>
		<title>Cari Bubble Drink User</title>
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
				}
				function addMarker(latitude, longtitude, info){
					var pt = new google.maps.LatLng(latitude, longtitude);
					bounds.extend(pt);
					var marker = new google.maps.Marker({
						map: map,
						position: pt,
						title: "Klik untuk mengetahui lebih lanjut"
					});
					map.fitBounds(bounds);
					bindInfoWindow(marker, map, infoWindow, info);
				}
				<?php
					include "koneksi.php";
					$data=mysqli_query($koneksi,"select * from tb_lokasi as a inner join tb_toko as b on a.id_lokasi=b.id_lokasi");
					while($d=mysqli_fetch_array($data)){
						$nama_lokasi=$d['nama_lokasi'];
						$nama_toko=$d['nama_toko'];
						$alamat=$d['alamat'];
						$longtitude=$d['longtitude'];
						$latitude=$d['latitude'];
						echo ("addMarker($latitude,$longtitude,'$nama_lokasi<br>$nama_toko<br>$alamat');\n");
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
					<li class="nav-item active">
						<a class="nav-link" href="cari_bubble_drink_user.php">Bubble Drink --> Komentar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		<div id="map-canvas"></div>
		<h1>Cari Bubble Drink</h1>
		<form method="POST">
			<table class="table">
				<tr>
					<td><input type="text" name="txt_nama" placeholder="Nama Bubble Drink"></td>
					<td><input type="text" name="txt_harga" placeholder="Harga Bubble Drink"></td>
					<td><input type="text" name="txt_diskon" placeholder="Diskon"></td>
					<td>
						<select name="s_toko">
							<?php
								include"koneksi.php";
								$data=mysqli_query($koneksi,"select * from tb_bubble_drink as a inner join tb_toko as b on a.id_toko=b.id_toko");
								while($d=mysqli_fetch_array($data)){ ?>
									<option value="<?=$d['id_toko']; ?>"><?=$d['nama_toko']; ?></option>
								<?php }
							?>
						</select>
					</td>
					<td><input class="btn btn-primary" type="submit" name="submit" value="Cari Bubble Drink"></td>
				</tr>
			</table>
		</form>
		<table class="table">
			<tr>
				<th>Nama Bubble Drink</th>
				<th>Harga</th>
				<th>Diskon</th>
				<th>Nama Toko</th>
				<th>Aksi</th>
			</tr>
			<?php
				include "koneksi.php";
				if(!isset($_POST['submit'])){
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink as a inner join tb_toko as b on a.id_toko=b.id_toko");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['nama_bubble_drink']; ?></td>
							<td><?php echo $d['harga_bubble_drink']; ?></td>
							<td><?php echo $d['diskon_bubble_drink']; ?></td>
							<td><?php echo $d['nama_toko']; ?></td>
							<td><a class="btn btn-primary" href="cari_komentar_dan_rating_user.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Detail</a></td>
						</tr>
					<?php }
				} ?>
				<?php if(isset($_POST['submit'])){
					$nama=$_POST['txt_nama'];
					$harga=$_POST['txt_harga'];
					$diskon=$_POST['txt_diskon'];
					$toko=$_POST['s_toko'];
					$data=mysqli_query($koneksi,"select * from tb_bubble_drink as a inner join tb_toko as b on a.id_toko=b.id_toko where nama like '%$nama%' or harga like '%$harga%' or diskon like '%$diskon%' or id_toko like '%$toko%'");
					while($d=mysqli_fetch_array($data)){ ?>
						<tr>
							<td><?php echo $d['nama_bubble_drink']; ?></td>
							<td><?php echo $d['harga_bubble_drink']; ?></td>
							<td><?php echo $d['diskon_bubble_drink']; ?></td>
							<td><?php echo $d['nama_toko']; ?></td>
							<td><a class="btn btn-primary" href="cari_komentar_dan_rating_user.php?id_bubble_drink=<?php echo $d['id_bubble_drink']; ?>">Detail</a></td>
						</tr>
					<?php }
				} ?>
		</table>
	</body>
</html>