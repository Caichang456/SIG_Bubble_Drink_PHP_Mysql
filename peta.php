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

    <?php
          $data=mysqli_query($koneksi,"select * from tb_lokasi");
          while($d=mysqli_fetch_array($data)){
            $nama_lokasi=$d['nama_lokasi'];
            $alamat=$d['alamat'];
            $nomor_handphone=$d['nomor_handphone'];
            $longtitude=$d['longtitude'];
            $latitude=$d['latitude'];
            echo "
            <script>
              var lat=$latitude;
              var lng=$longtitude;
            </script>";
          }
  ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiTYo0s-mGdijeuL6BfruBt3T_FG4o9wM"></script>  
    <script>
      var marker;
      function initialize(){
        console.log("Halo");
        var mapCanvas=document.getElementById('map-canvas');
        var mapOptions={
          mapsTypeId:google.maps.MapTypeId.ROADMAP,
          center:new google.maps.LatLng(lat,lng),
            zoom:15
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker= new google.maps.Marker({
          map:map,
          position:new google.maps.LatLng(lat,lng)
        })
        var infoWindow = new google.maps.InfoWindow;
        infoWindow.setContent("tez");
        infoWindow.open(map, marker);        
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>