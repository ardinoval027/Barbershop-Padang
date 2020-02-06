<?php
include ('../inc/connect.php');
$id = $_GET['id'];
	$sql   = "delete from district where id=$id";
	$delete1 = pg_query($sql1);
	$delete = pg_query($sql);
	if ($delete1){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listkec'\");
		</script>";
	}
	else{
		echo 'error';

	}
	if ($delete){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listkec'\");
		</script>";
	}
	else{
		echo 'error';

	}

?>