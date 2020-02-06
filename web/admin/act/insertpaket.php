<?php
	include ('../inc/connect.php');
	$id = $_POST['id'];
	$id_bbs = $_POST['id_bbs'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$sql = pg_query("insert into paket (id, id_barbershop ,nama, harga_paket) values ('$id', '$id_bbs', '$nama', '$harga')");
	
	session_start();
	if ($sql){
		if(!$_SESSION['P']){
		echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../?page=listpaketbarbershop&id=$id_bbs'\");
		</script>";
		}
		else{
		echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../index1.php?page=listpaketbarbershop&id=$id_bbs'\");
		</script>";
		}
}else{
	echo 'error';
}
?>