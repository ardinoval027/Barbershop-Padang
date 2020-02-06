<?php
include ('../inc/connect.php');
$username = $_GET['username'];
$nama = $_GET['nama'];

	
	$sql   = "delete from accounts_pelanggan where username like '%$username%'";
	
	$delete = pg_query($sql);

	if ($delete){
		
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listuser'\");
		</script>";
	
	}
	else{
		echo 'error';

	}

?>