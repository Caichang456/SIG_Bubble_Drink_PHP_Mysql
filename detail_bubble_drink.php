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
					//center:new google.maps.LatLng(3.599591,98.706707),
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
						echo ("addMarker($latitude,$longtitude,'$nama_lokasi\n$nomor_handphone\n$alamat');\n");
					}
				?>
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>
	<body>
		<div id="map-canvas"></div>
		<h1>Detail Bubble Drink</h1>
	</body>
</html>