<?php
include ('../inc/connect.php');
$id = $_GET['id_paket'];
$id_bbs = $_GET['id_bbs'];
session_start();

	$sql   = "delete from paket where id='$id' ";
	$delete = pg_query($sql);
	if ($delete){
		if(!$_SESSION['P']){
		echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listpaketbarbershop&id=$id_bbs'\");
		</script>";
		}
		else{
		echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../index1.php?page=listpaketbarbershop&id=$id_bbs'\");
		</script>";
		}
	}
	else{
		echo 'error';

	}

?>