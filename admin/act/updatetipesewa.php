<?php
include ('../inc/connect.php');
$id = $_POST['id'];
$nama = $_POST['nama_sewa'];
$satuan = $_POST['satuan_sewa'];

$sql  = "update tipe set nama='$nama', satuan='$satuan' where id='$id'";
$update = pg_query($sql);

if ($update){
	echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../?page=listtipesewa'\");
		</script>";
}else{
	echo 'error';
}
?>