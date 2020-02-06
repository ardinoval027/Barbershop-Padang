<?php
session_start();
include ('../inc/connect.php');
$id = $_GET['id_barber'];
	
	$sql   = "delete from barber where barber_id='$id' ";

	
	$delete = pg_query($sql);
	if ($delete){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../index1.php?page=listbarber&id=$_SESSION[id_barbershop]'\");	
		</script>";
	}
	else{
		echo 'error';

	}

?>