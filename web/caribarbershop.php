
<?php
require 'connect.php';

$cari_nama = $_GET["cari_nama"];
 

$querysearch	=" 	SELECT distinct a.id,a.nama,a.alamat,ST_X(ST_Centroid(a.geom)) AS longitude, ST_Y(ST_CENTROID(a.geom)) As latitude
					FROM barbershop as a where upper(a.nama) like upper('%$cari_nama%') order by a.nama
				";
			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id=$row['id'];
          $name=$row['nama'];
          $address=$row['alamat'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>