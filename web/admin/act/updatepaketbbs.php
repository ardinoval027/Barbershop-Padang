<?php
include ('../inc/connect.php');
$id_paket = $_POST['id'];
$id_bbs = $_POST['id_barbershop'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];

$sql  = "update paket set nama='$nama', harga_paket='$harga' where id='$id_paket' and id_barbershop='$id_bbs'";
$update = pg_query($sql);

if ($update){
	if(!$_SESSION['P']){
		echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../index1.php?page=listpaketbarbershop&id=$id_bbs'\");
		</script>";
		}
		else{
		echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../index1.php?page=listpaketbarbershop&id=$id_bbs'\");
		</script>";
		}
}else{
	echo 'error';
}
?>