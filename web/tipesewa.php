<?php
include ('connect.php');
$id=$_GET["id"];
$dataarray=array();

$sql=pg_query("select id, nama from tipe ");

while($row = pg_fetch_array($sql)){
	$id=$row['id'];
	$nama=$row['nama'];
	$dataarray[]=array('id'=>$id,'nama'=>$nama);
}
echo json_encode ($dataarray);
   			  
?>