<?php 
	include ('../inc/connect.php');
	$id = $_POST['id'];
	$querysearch="SELECT serial_number from barbershop_gallery where id='$id' order by serial_number desc limit 1";


	 $hasil=pg_query($querysearch);
	 $serial_number = 1;
	 while($baris = pg_fetch_array($hasil))
	 {
	 	$angka = $baris['serial_number'] + 1;
	 	$serial_number = $angka;
	 }

	$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 5000000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$sourcename;
		$filepath="../../foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
		$sql = pg_query("INSERT into barbershop_gallery values('$serial_number','$id','$name')");
		if($sql){
			header("location:../index.php?page=detail&id=$id");
		}
	}
	else{
		echo "The Picture Isn't Valid!<br>";
		echo "Go Back To <a href='../index.php?page=detail&id=$id'></a>";
	}
?>