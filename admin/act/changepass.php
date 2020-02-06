<?php
include("../inc/connect.php");

$passwordlama = $_POST["passlama"];
$passlama = md5(md5($passwordlama));
$passwordbaru = $_POST["passbaru"];
$passbaru = md5(md5($passwordbaru));
$konfirmasipassword = $_POST["konfirm"];
$username = $_POST["user"];

	$querycek = pg_query("select * from accounts where username = '$username' and password = '$passlama'");
	$count = pg_num_rows($querycek);
	// echo $count;
	if ($count == 1 && $passwordbaru==$konfirmasipassword){
	$queryupdate = pg_query("update accounts set password = '$passbaru' where username = '$username'");
		if($queryupdate){
			echo "<script>
		alert (' Password Successfully Change');
		eval(\"parent.location='../index1.php?page=ubahpw'\");
		</script>";
		}
	}
	else {
		if($queryupdate){
			echo "<script>
		alert (' Error');
		eval(\"parent.location='../index1.php?page=ubahpw'\");
		</script>";
		}
	}
?>