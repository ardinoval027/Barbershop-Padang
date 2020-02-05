<?php
include ('../inc/connect.php');
$id = $_GET['id'];
	
	$sql   = "delete from tipe where id='$id' ";

	
	$delete = pg_query($sql);
	if ($delete){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listtipesewa'\");
		</script>";
	}
	else{
		echo 'error';

	}

?>