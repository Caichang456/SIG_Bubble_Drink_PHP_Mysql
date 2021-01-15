<?php
	include "koneksi.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Detail Bubble Drink</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
		<script type="text/javascript" src="jquery-3.5.1.js"></script>
		<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
		<style type="text/css">
			#map-canvas{
				width: 100%;
				height: 500px;
			}
		</style>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAme5zVA4mLFAQmGMGQqp6KU0kKwP1BUEk&callback=initialize" async defer></script>
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
				}
				<?php
					include "koneksi.php";
					$data=mysqli_query($koneksi,"select * from tb_toko as a inner join tb_lokasi as b on a.id_lokasi=b.id_lokasi");
					while($d=mysqli_fetch_array($data)){
						$nama_toko=$d['nama_toko'];
						$alamat=$d['alamat'];
						$longtitude=$d['longtitude'];
						$latitude=$d['latitude'];
						echo ("addMarker($latitude,$longtitude,'$nama_toko<br>$alamat');\n");
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
						<a class="nav-link" href="cari_bubble_drink_user.php">Bubble Drink --> Lokasi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		<div id="map-canvas"></div>
		<h1>Detail Bubble Drink</h1>
		<table width="1">
			<tr>
				<th>Nama Bubble Drink</th>
				<th>Rating</th>
				<th>Komentar User</th>
			</tr>
			<form action="simpan_komentar_user.php" method="POST">
				<tr>
					<td>
						<select name="bubble_drink">
							<?php
								$data=mysqli_query($koneksi,"select * from tb_bubble_drink");
								while($d=mysqli_fetch_array($data)){ ?>
									<option value="<?php echo $d['id_bubble_drink']; ?>"><?php echo $d['nama_bubble_drink']; ?></option>
								<?php }
							?>
						</select>
					</td>
					<td>
						<select name="rating">
							<?php
								for($i=1;$i<=5;$i++){
									echo "<option value=\"$i\">$i</option>";
								}
							?>
						</select>
					</td>
					<td><input type="text" name="txt_komentar_user"></td>
					<td><input type="submit" name="submit" value="Simpan" class="btn-primary"></td>
				</tr>
			</form>
			<?php
				$data2=mysqli_query($koneksi,"select * from tb_komentar_dan_rating as a inner join tb_bubble_drink as b on a.id_bubble_drink=b.id_bubble_drink inner join tb_user as c on a.id_user=c.id_user");
				while($d2=mysqli_fetch_array($data2)){ ?>
					<tr>
						<td><?php echo $d2['nama_bubble_drink']; ?></td>
						<td><?php echo $d2['rating']; ?></td>
						<td><?php echo $d2['komentar_user']; ?></td>
						<td><a href="ubah_komentar_dan_rating.php?id_komentar_dan_rating=<?php echo $d2['id_komentar_dan_rating'];?>">Ubah</a></td>
					</tr>
				<?php }
			?>
		</table>
	</body>
</html>