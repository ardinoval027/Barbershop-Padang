<?php
include 'connect.php';

$username = $_POST['username'];
$barbershop = $_POST['barbershop'];
$barber= $_POST['barber'];
$id =  $_POST['id_booking'];
$tgl_booking =  $_POST['tgl_booking'];
$status = $_POST['status'];
$jam = $_POST['jam'];



$cari = pg_query("SELECT * from booking where username='$username' and tgl_booking='$tgl_booking' and jam='$jam' and status='2'");
if(pg_num_rows($cari) == 0){
	
	$cari_jadwal = pg_query("SELECT * from booking where tgl_booking='$tgl_booking' and barber_id='$barber' and jam='$jam' and status='2'");
	if(pg_num_rows($cari_jadwal) > 0){
		echo "<script>
				alert (' Jadwal Sudah Di booking');
		    eval(\"parent.location='booking.php?id_bbs=$barbershop'\");
				</script>";
	} else {
		$paket = explode("-", $_POST['paket'])[0];;
		$sql = pg_query("INSERT into booking (username, tgl_booking, status, barber_id, jam, id_paket ) 
				values ('$username', '$tgl_booking', '$status', '$barber','$jam', '$paket')");

		
		
		//$harga_paket= $_POST['harga_paket'];

		// $sqlpaket = "INSERT into booking ( id_booking, id_paket, harga) VALUES 
		// 				('$id', '$paket', '$harga_paket')";
		// 	$insertpaket = pg_query($sqlpaket);
			if ($sql){
				echo "<script>
					alert (' Anda Berhasil Booking');
				eval(\"parent.location='detailbooking.php?barber=$barber&tgl=$tgl_booking&jam=$jam'\");
					</script>";
			}else{
				echo "<script>
				alert (' Gagal! Jadwal Sudah Di booking');
		    eval(\"parent.location='booking.php?id_bbs=$barbershop'\");
				</script>";
			}
	}

}
else {
	echo "<script>
		alert ('Anda Sudah Terdaftar Booking Hari ini');
    eval(\"parent.location='booking.php?id_bbs=$barbershop'\");
		</script>";
  }



	

?>
