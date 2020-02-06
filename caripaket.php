
<?php
require 'connect.php';

$cari_paket = $_GET["paket"];
$querysearch = "";

if($cari_paket==1){
$querysearch=pg_query(" SELECT barbershop.id,barbershop.nama, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat, sum(nilai) as nilai, count(nilai) as jumlah, (sum(nilai) / count(nilai)) as rata
							FROM barbershop
							INNER JOIN rating_pelanggan ON rating_pelanggan.id_barbershop=barbershop.id GROUP BY barbershop.id having count(nilai) > 0  order by rata desc
				");


}
else if($cari_paket==2){
	$querysearch=pg_query(" SELECT barbershop.id,barbershop.nama, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat, sum(nilai) as nilai, count(nilai) as jumlah, (sum(nilai) / count(nilai)) as rata
	FROM barbershop
	INNER JOIN rating_pelanggan ON rating_pelanggan.id_barbershop=barbershop.id GROUP BY barbershop.id having count(nilai) > 0  order by rata asc
");
}	
	   
while($row = pg_fetch_array($querysearch))
	{
		$id=$row['id'];
		$name=$row['nama'];
		$longitude=$row['lng'];
		$latitude=$row['lat'];

		$dataarray[]=array('id'=>$id,'name'=>$name,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>