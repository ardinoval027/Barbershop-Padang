<?php
session_start();
include ('connect.php');
// var_dump("string"); exit();

$uname = $_SESSION['username'];
$old_password = isset($_POST['old']) ? $_POST['old'] : '';
$pass = md5(md5($old_password));
$new_password = $_POST['new'];
$confirm_password = $_POST['confirm'];
$nu_password = md5(md5($new_password));
$user = pg_query("SELECT * FROM accounts_pelanggan WHERE upper(username)=upper('$uname')");
$data = pg_fetch_assoc($user);

if ($data){
    $query = "UPDATE accounts_pelanggan SET password='$nu_password' WHERE username='$uname'";
    if($old_password != '' && $data['password'] == $pass && $new_password == $confirm_password){
        pg_query($query);
    }
    else{
        var_dump([$query]); die("password kosong/salah atau konfirmasi password berbeda");
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>