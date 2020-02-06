<?php
	include ('../inc/connect.php');
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$role = $_POST['role'];
	$id_barbershop = $_POST['id_barbershop'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$password = $_POST['password'];
	$pass = md5(md5($password));

	$cek_username = "SELECT * from accounts where username = '$user'";
	$query = pg_query($cek_username);
	if(pg_num_rows($query) == 0){
		if($role=='A'){
		$sql = pg_query("insert into accounts (nama, alamat, hp, role, username, password, email) values ('$nama', '$alamat', '$no_hp','$role', '$user', '$pass', '$email')");
		
			if ($sql){
				echo "<script>
				alert (' Data Successfully Added');
				eval(\"parent.location='../?page=listadmin'\");
				</script>";
			
			}else{
				echo 'error';
			}
		}else if($role=='P'){
			$sql = pg_query("insert into accounts (nama, id_barbershop, alamat, hp, role, username, password, email) values ('$nama', '$id_barbershop', '$alamat', '$no_hp','$role', '$user', '$pass', '$email')");
		
			if ($sql){
				echo "<script>
				alert (' Data Successfully Added');
				eval(\"parent.location='../?page=listadminbbs'\");
				</script>";
			
			}else{
				echo 'error';
			}
		}
	} else {
		echo "<script>
				alert ('Username sudah ada');
				eval(\"parent.location='../?page=user'\");
				</script>";
	}

	
	
?>