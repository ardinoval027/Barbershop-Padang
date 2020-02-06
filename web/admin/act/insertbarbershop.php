<?php
include ('../inc/connect.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$geom = $_POST['geom'];
$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 600000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id.'_'.$sourcename;
		$filepath="../../foto/".$name;
		
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);

	} else if ($foto=='null' || $foto=='' || $foto==null){
		$foto='foto.jpg';
	}
	
	$sql = pg_query("insert into barbershop (id, nama, alamat, geom, image, kontak) values ('$id', '$nama', '$alamat', ST_GeomFromText('$geom'), '$name', '$kontak')");
					
	$querysearch="SELECT serial_number from barbershop_gallery where id='$id' order by serial_number desc limit 1";

	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 600000)){
		$hasil=pg_query($querysearch);
		$serial_number = 1;
		while($baris = pg_fetch_array($hasil))
		{
			$angka = $baris['serial_number'] + 1;
			$serial_number = $angka;
		}

		$sql_gallery = pg_query("INSERT into barbershop_gallery values('$serial_number','$id','$name')");	
	}

if ($sql){
	echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../?page=listbarbershop'\");
		</script>";
}else{
	echo "<script>
	alert (' Gagal menambahkan data');
	eval(\"parent.location='../?page=listbarbershop'\");
	</script>";
}

?>