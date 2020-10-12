<?php
	include "koneksi.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Peta</title>
		<style>
			#map-canvas{
				width: 500px;
				height: 500px;
			}
		</style>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script>
			var marker;
			function initialize(){
				var mapCanvas=document.getElementById('map-canvas');
				var mapsOptions={
					mapsTypeId:google.maps.MapTypeId.ROADMAP
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
				function addMarker(lat, lng, info) {
					var pt = new google.maps.LatLng(lat, lng);
					bounds.extend(pt);
					var marker = new google.maps.Marker({
						map: map,
						position: pt
					});       
					map.fitBounds(bounds);
					bindInfoWindow(marker, map, infoWindow, info);
				}
				<?php
					$data=mysqli_query($koneksi,"select * from tb_lokasi");
					while($d=mysqli_fetch_array($data)){
						$nama_lokasi=$d['nama_lokasi'];
						$alamat=$d['alamat'];
						$nomor_handphone=$d['nomor_handphone'];
						$longtitude=$d['longtitude'];
						$latitude=$d['latitude'];
						echo ("addMarker($latitude,$longtitude,'$nama_lokasi<br>$alamat<br>$nomor_handphone');\n");
					}
				?>
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>
	<body>
		<div id="map-canvas"></div>
	</body>
</html>