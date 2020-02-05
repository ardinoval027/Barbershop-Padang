<?php
	include ('../inc/connect.php');
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$geom = $_POST['geom'];
	$sql = pg_query("insert into district (id, name, geom) values ('$id', '$nama', '$geom')");
	
	if ($sql){
			echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../?page=kecamatan'\");
		</script>";
}else{
	echo 'error';
}
?>