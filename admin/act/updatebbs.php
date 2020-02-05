<?php
include ('../inc/connect.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$geom = $_POST['geom'];
$jenis_gambar=$_FILES['image']['type'];
if($jenis_gambar == 'null' || $jenis_gambar == "" || $jenis_gambar == null){
	$sql = pg_query("update barbershop set nama='$nama', alamat='$alamat', kontak='$kontak', geom=ST_GeomFromText('$geom') where id='$id'");
}else{
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 600000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id.'_'.$sourcename;
		$filepath="../../foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
	} else if ($foto=='null' || $foto=='' || $foto==null){
		$foto='foto.jpg';
	}
$sql = pg_query("update barbershop set nama='$nama', alamat='$alamat', kontak='$kontak', image='$name', geom=ST_GeomFromText('$geom') where id='$id'");
}
if ($sql){
	echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../index1.php?page=content'\");	
		</script>";
}else {
	echo 'error';
}
?>