<?php
	include ('../inc/connect.php');
	$id = $_POST['id'];
	$id_bbs = $_POST['id_bbs'];
	$nama = $_POST['nama'];
	$sql = pg_query("insert into barber (barber_id, barber_nama ,barber_shop) values ('$id', '$nama','$id_bbs')");
	
	session_start();
	if ($sql){
		if(!$_SESSION['P']){
		echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../?page=listbarber&id=$id_bbs'\");
		</script>";
		}
		else{
		echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../index1.php?page=listbarber&id=$id_bbs'\");
		</script>";
		}
}else{
	echo 'error';
}
?>