<?php
include ('../inc/connect.php');
$id = $_GET['id_booking'];
	$sql   = "DELETE from booking where id='$id'";
	$sql1   = "DELETE from detail_booking where id_booking='$id'";
	$delete1 = pg_query($sql1);
	$delete = pg_query($sql);
	if ($delete1){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../index1.php?page=daftarpesanan'\");
		</script>";
	}
	else{
		echo 'error';

	}
	if ($delete){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../index1.php?page=aftarpesanan'\");
		</script>";
	}
	else{
		echo 'error';

	}

?>