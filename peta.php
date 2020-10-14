<!DOCTYPE html>
<html>
  <head>
    <title>maribelajarcoding.com</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>      
      #map {
        height: 80%;
        width: 80%;
         margin: 0 auto 0 auto;
      }
      html, body {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <h2 align="center">Peta</h2>
    <div id="map"></div>
     <script>
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-7.0016372,110.4428114),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          downloadUrl('http://localhost/www/SIG_Bubble_Drink_Admin/data-xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');

            Array.prototype.forEach.call(markers, function(markerElem) {
              var id_lokasi = markerElem.getAttribute('id_lokasi');
              var nama_lokasi = markerElem.getAttribute('nama_pariwisata');
              var alamat = markerElem.getAttribute('alamat');
              var nomor_handphone=markerElem.getAttribute('nomor_handphone');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitude')),
                  parseFloat(markerElem.getAttribute('longtitude')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = nama_pariwisata
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = alamat
              infowincontent.appendChild(text);
              var marker = new google.maps.Marker({
                map: map,
                position: point
              });
              
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };
        request.open('GET', url, true);
        request.send(null);
      }
      function doNothing() {}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc64FYvZwdFnypCq-bRELbKFTHGprzSKI&callback=initMap"
    async defer></script>
  </body>
</html>