<?php
$id_paket = explode("-", $_GET['id'])[0];
$id_barbershop = explode("-", $_GET['id'])[1];

include("connect.php");
$query_detail_paket = "SELECT harga_paket FROM paket WHERE id_barbershop='$id_barbershop' AND id='$id_paket'"; 
$hasil4 = pg_query($query_detail_paket);
$row = pg_fetch_assoc($hasil4);
$harga = $row['harga_paket'];

$data = array("harga"=>$harga);
echo json_encode($data);
?>