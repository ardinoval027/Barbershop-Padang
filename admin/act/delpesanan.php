<?php
session_start();
include ('../inc/connect.php');
$id = $_GET['barber'];
$tgl = $_GET['tgl'];
$jam = $_GET['jam'];
$sql   = "DELETE FROM booking WHERE barber_id='$id' AND tgl_booking='$tgl' AND jam='$jam'";
	
$delete = pg_query($sql);
if ($delete){
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
else{
    echo 'error';
}

?>