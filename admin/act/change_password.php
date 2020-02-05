<?php
session_start();
include ('../inc/connect.php');

$uname = isset($_POST['username']) ? $_POST['username'] : $_SESSION['_username'];

$old_password = isset($_POST['old']) ? $_POST['old'] : '';
$pass = md5(md5($old_password));
$new_password = $_POST['new'];
$confirm_password = $_POST['confirm'];
$nu_password = md5(md5($new_password));
$user = pg_query("SELECT * FROM accounts WHERE upper(username)=upper('$uname')");
$data = pg_fetch_assoc($user);
if ($data){
	if($old_password != ''){
		if($data['password'] != $pass){
			echo "<script>window.history.go(-2);</script>";
			exit();
		}
	}

	if ($new_password == $confirm_password) {
		$change = pg_query("UPDATE accounts SET password='$nu_password' WHERE username='$uname'");
	}
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>