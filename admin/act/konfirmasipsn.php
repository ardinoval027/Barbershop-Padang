<?php
include ('../inc/connect.php');
$status = $_POST['status'];
$barber = $_GET["barber"];
$tgl = $_GET["tgl"];
$jam = $_GET["jam"];

//$booking = pg_query("SELECT * from booking where id='$id'");
//$bk = pg_fetch_array($booking);
$cari_jadwal = pg_query("SELECT * from booking where barber_id='$barber' and tgl_booking='$tgl' and jam='$jam' and status='$status'");
if(pg_num_rows($cari_jadwal) > 0){
	echo "<script>
			alert (' Jadwal Sudah Di booking');
			eval(\"parent.location='../index1.php?page=daftarpesanan&id=$id_bbs'\");
			</script>";
} else {
	$sql = "UPDATE booking SET status='$status', tgl_konfirmasi=now() where barber_id='$barber' and tgl_booking='$tgl' and jam='$jam' ";
	$update = pg_query($sql);

	$page = 'daftarpesanan';
	if($status == 2){
		$page = 'pesanankonfirm';
	} else if($status == 3){
		$page = 'pesananbatal';
	}
	if ($update){
		echo "<script>
			alert (' Data Successfully Change');
			eval(\"parent.location='../index1.php?page=$page&id=$id_bbs'\");
			</script>";
	}else{
		echo 'error';
	}
}
?>