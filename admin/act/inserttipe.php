<?php
	include ('../inc/connect.php');
	$nama = $_POST['nama'];
	$id = $_POST['id'];
	$satuan = $_POST['satuan'];
	
	$sql = pg_query("insert into tipe (id, nama, satuan) values ('$id', '$nama', '$satuan')");
	
	if ($sql){
		echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../?page=listtipesewa'\");
		</script>";
	
}else{
	echo 'error';
}
?>