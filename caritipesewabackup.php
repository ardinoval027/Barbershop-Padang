<?php
require 'connect.php';


$tip=$_GET['tip'];
$tip = explode(",", $tip);
$c = "";
for($i=0;$i<count($tip);$i++){
	if($i == count($tip)-1){
		$c .= "'".$tip[$i]."'";
	}else{
		$c .= "'".$tip[$i]."',";
	}
}
$querysearch="select barbershop.id,barbershop.name,ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from barbershop
		 join detail_tipe on barbershop.id=detail_tipe.id_barbershop where detail_tipe.id_tipe in ($c) group by id_barbershop,barbershop.id,barbershop.name";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$id=$row['id'];
		$name=$row['name'];
		$longitude=$row['lng'];
		$latitude=$row['lat'];

		$dataarray[]=array('id'=>$id,'name'=>$name,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>