<?php
include ('../inc/connect.php');

$id_barbershop = $_POST['id_barbershop'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$pass = md5(md5($password));
$role = $_POST['role'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];

$sql  = "UPDATE accounts SET nama='$nama', hp='$no_hp', alamat='$alamat' where username='$username'";
$update = pg_query($sql);

if ($update){
	if($role == 'A' || $role == 'P'){
		echo "<script>
			alert (' Data Successfully Change');
			eval(\"parent.location='../?page=listadminbbs'\");
			</script>";
	} else {
		echo "<script>
			alert (' Data Successfully Change');
			eval(\"parent.location='../?page=listuser'\");
			</script>";
	}
}else{
	echo 'error';
}
?>