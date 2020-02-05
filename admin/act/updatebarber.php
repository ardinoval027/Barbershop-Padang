<?php
session_start();
include ('../inc/connect.php');
$id = $_POST['id'];
$nama = $_POST['nama'];

$sql = pg_query("update barber set barber_nama='$nama' where barber_id='$id'");
if ($sql){
	echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../index1.php?page=listbarber&id=$_SESSION[id_barbershop]'\");	
		</script>";
}else {
	echo 'error';
}
?>