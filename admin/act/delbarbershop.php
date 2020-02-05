<?php
include ('../inc/connect.php');
$id = $_GET['id'];
	
	$sql   = "delete from barbershop where id='$id' ";
	$sql1 = "delete from barbershop_gallery where id='$id'";
	
	$delete = pg_query($sql1);
	if ($delete){
		$delete2 = pg_query($sql);
		if($delete2){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listbarbershop'\");
		</script>";
		}
	}
	else{
		echo 'error';

	}

?>