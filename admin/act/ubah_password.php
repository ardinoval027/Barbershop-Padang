<?php
session_start();
include ('../inc/connect.php');

$uname = isset($_POST['username']) ? $_POST['username'] : $_SESSION['_username'];
$new_password = $_POST['new'];
$confirm_password = $_POST['confirm'];
$nu_password = md5(md5($new_password));
$q = "UPDATE accounts_pelanggan SET password='$nu_password' WHERE username='$uname'";
$user = pg_query("SELECT COUNT(*) AS num_rows FROM accounts_pelanggan WHERE upper(username)=upper('$uname')");
$data = pg_fetch_assoc($user);
if ($data['num_rows'] > 0){
	if ($new_password == $confirm_password) {
        $change = pg_query("UPDATE accounts_pelanggan SET password='$nu_password' WHERE username='$uname'");
    }
    else{
        print("<pre>".print_r([$uname, $new_password, $confirm_password, $data, $user, $q], true)."</pre>"); exit();
    }
}
else{
    var_dump($data['num_rows']); exit();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
print("<pre>".print_r($old_password, true)."</pre>");
?>