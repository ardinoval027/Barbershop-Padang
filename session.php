<?php
include 'admin/inc/connect.php';
session_start();
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$_SESSION['username'] = $username;
	// var_dump([$username, $_SESSION['username']]); exit();
	$password = $_POST['password'];
	$pass = md5(md5($password));

	//$pass=$password;
	$sql = pg_query("SELECT * FROM accounts WHERE upper(username)=upper('$username') AND password='$pass'");
	$num = pg_num_rows($sql);
	$dt = pg_fetch_array($sql);
	if($num==1){		
		
		if($dt['role']=='A'){
			$_SESSION['A'] = true;
			$_SESSION['name']=$dt['nama'];
			?><script language="JavaScript">document.location='admin/index.php'</script><?php
			echo "<script>alert ('hyyy');</script>";
			$result = pg_query("update accounts set last_login = now() where username='$username'");
		} else if($dt['role']=='P'){
			$_SESSION['P'] = true;
			$_SESSION['username']=$dt['username'];
			$_SESSION['id_barbershop']=$dt['id_barbershop'];
			$_SESSION['name']=$dt['nama'];
			$query=pg_query("select * from barbershop where id='$dt[id_barbershop]'");
			$data=pg_fetch_assoc($query);
			?><script language="JavaScript">document.location='admin/index1.php'</script><?php
			echo "<script>alert (' hyyy');</script>";
			$result = pg_query("update accounts set last_login = now() where username='$username'");
		
		} else if($dt['role']=='C'){
			$_SESSION['C'] = true;
			$_SESSION['username']=$dt['username'];
			$_SESSION['name']=$dt['nama'];
			?><script language="JavaScript">document.location='indexs.php'</script><?php
			$result = pg_query("update accounts set last_login = now() where username='$username'");
		}
				
	}else{
		$sql = pg_query("SELECT * FROM accounts_pelanggan WHERE upper(username)=upper('$username') AND password='$pass'");
		$num = pg_num_rows($sql);
		$dt = pg_fetch_array($sql);
		if($num==1){
			$_SESSION['C'] = true;
			$_SESSION['username']=$dt['username'];
			$_SESSION['name']=$dt['nama'];
			?><script language="JavaScript">document.location='indexs.php'</script><?php
			$result = pg_query("update accounts_pelanggan set last_login = now() where username='$username'");
		}
		else {
			echo "<script>
			alert (' Login Gagal, Cek Kembali Username dan Password Anda !');
			document.location='login.php'
			</script>";
			/*eval(\"parent.location='login.php '\");	*/
		}
		
	}
}
?>