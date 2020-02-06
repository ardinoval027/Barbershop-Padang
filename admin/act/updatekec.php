<?php
include ('../inc/connect.php');


$id = $_POST['id'];
$nama = $_POST['nama'];
$geom = $_POST['geom'];
$sql  = "update district set name='$nama', geom='$geom' where id='$id'";
$update = pg_query($sql);

if ($update){
	echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../?page=listkec'\");
		</script>";
}else{
	echo 'error';
}
?>