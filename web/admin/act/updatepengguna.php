<?php
include ('../inc/connect.php');

$id_barbershop = $_POST['id_barbershop'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$pass = md5(md5($password));
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];

$sql  = "UPDATE accounts_pelanggan SET nama='$nama', hp='$no_hp', alamat='$alamat' WHERE username='$username'";
$update = pg_query($sql);

if ($update){
    echo "<script>
			alert ('Data Successfully Change');
			eval(\"parent.location='../?page=listuser'\");
            </script>";
}
else{
    echo "<script>
			alert ('Failed To Change Data');
			eval(\"parent.location='../?page=listuser'\");
			</script>";
}
?>