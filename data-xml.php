<?php
header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');

include("koneksi.php");

echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<markers>";
$sql="select * from tb_lokasi";
$query=mysqli_query($koneksi,$sql);
while ($data=mysql_fetch_array($query)) {
	echo "<marker id_lokasi='".$data['id_lokasi']."' nama_lokasi='".$data['nama_lokasi']."'  alamat='".$data['alamat']."' nomor_handphone'".$data['nomor_handphone']."' latitude='".$data['latitude']."' longtitude='".$data['longtitude']."'/>";
}
echo "</markers>";