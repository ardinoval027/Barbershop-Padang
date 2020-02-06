<?php 

include 'connect.php';

$id_bbs = $_GET['id_bbs'];
$tanggal = $_GET['tanggal'];
$barber = $_GET['id_barber'];

if($tanggal != ''){
    $cek_acara = "SELECT * from booking where barber_id = '$barber' and tgl_booking = '$tanggal'";
    $query = pg_query($cek_acara);
    
    $dataArray = array();
    if(pg_num_rows($query) >= 10){
        $dataArray['result'] = 1;
        $dataArray['jadwal'] = $arrJadwal();
    } else {
        $dataArray['result'] = 0;
        $arrJadwal = array();
        while($row = pg_fetch_array($query))
        {
            array_push($arrJadwal,$row['jam']);
        }
        $dataArray['jadwal'] = $arrJadwal;

    }
} else {
    $dataArray['result'] = 2;
}


echo json_encode($dataArray);
?>