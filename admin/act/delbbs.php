<?php
include ('../inc/connect.php');
$username = $_GET['username'];

	
	$sql   = "delete from accounts where username='$username'";

	

	
	$delete = pg_query($sql);
	if ($delete){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listadminbbs'\");
		</script>";
	}
	else{
		echo 'error';

	}

?>