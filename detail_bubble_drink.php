<!DOCTYPE html>
<html>
	<head>
		<title>Detail Bubble Drink</title>
		<style type="text/css">
			#map-canvas{
				width: 500px;
				height: 500px;
			}
		</style>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiTYo0s-mGdijeuL6BfruBt3T_FG4o9wM"></script>
		<script type="text/javascript">
			var marker;
			function initialize(){
				var mapCanvas=document.getElementById('map-canvas');
				var mapOptions={
					mapsTypeId:google.maps.MapTypeId.ROADMAP,
					center:new google.maps.LatLng(3.599591,98.706707),
					zoom:9
				}
				var map = new google.maps.Map(mapCanvas, mapOptions);
				var infoWindow = new google.maps.InfoWindow;
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
						position: pt
					});
				}
				<?php
					include "koneksi.php";
					$data=mysqli_query($koneksi,"select * from tb_lokasi");
					while($d=mysqli_fetch_array($data)){
						$nama_lokasi=$d['nama_lokasi'];
						$alamat=$d['alamat'];
						$nomor_handphone=$d['nomor_handphone'];
						$longtitude=$d['longtitude'];
						$latitude=$d['latitude'];
						echo ("addMarker($latitude,$longtitude,'$nama_lokasi $nomor_handphone $alamat');\n");
					}
				?>
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>
	<body>
		<div id="map-canvas"></div>
		<h1>Detail Bubble Drink</h1>
		<table width="1">
			<tr>
				<th>Nama Bubble Drink</th>
				<th>Nama Lokasi</th>
				<th>Rating</th>
				<th>Komentar User</th>
				<th>Komentar Admin</th>
				<th>Aksi</th>
			</tr>
			<form action="simpan_komentar_user.php" method="POST">
				<tr>
					<td><input type="text" name="txt_nama_bubble_drink" disabled="disabled"></td>
					<td><input type="text" name="txt_nama_lokasi" disabled="disabled"></td>
					<td><input type="text" name="txt_rating" disabled="disabled"></td>
					<td><input type="text" name="txt_komentar_user"></td>
					<td><input type="text" name="txt_komentar_admin" disabled="disabled"></td>
					<td><input type="submit" name="submit" value="Simpan"></td>
				</tr>
			</form>
		</table>
	</body>
</html>