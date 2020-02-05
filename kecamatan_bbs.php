<?php
require 'connect.php';

$kecamatan = $_GET['kecamatan'];
 

$querysearch	=" SELECT 
	barbershop.id,
	barbershop.nama,
	barbershop.alamat,
	st_x(st_centroid(barbershop.geom)) as longitude,
	st_y(st_centroid(barbershop.geom)) as latitude 
	from barbershop, kecamatan 
	WHERE st_contains(kecamatan.geom, barbershop.geom) and kecamatan.id='$kecamatan'
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
