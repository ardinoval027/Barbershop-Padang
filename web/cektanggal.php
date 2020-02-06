<?php 

include 'connect.php';

$id_bbs = $_GET['id_bbs'];
$tanggal = $_GET['tanggal'];
$jam = $_GET['jam'];
$barber = $_GET['barber'];

$cek_acara = "SELECT * from booking where barber_id = '$barber' and tgl_booking = '$tanggal' and jam = '$jam'";

$query = pg_query($cek_acara);

$dataArray = array();
if(pg_num_rows($query) == 0){
	$dataArray['result'] = 0;
} else {
	$dataArray['result'] = 1;
}

echo json_encode($dataArray);
?>