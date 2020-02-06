<?php
include ('connect.php');


$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$cp = $_POST['hp'];
$address = $_POST['address'];
$pass = md5(md5($password));

    $cek_username = "SELECT * from accounts_pelanggan where username = '$user'";
    $cek_username2 = "SELECT * from accounts where username = '$user'";
        $query = pg_query($cek_username); $query2 = pg_query($cek_username2);
        if(pg_num_rows($query) == 0 && pg_num_rows($query2) == 0){
            $query = "INSERT into accounts_pelanggan (nama, username, password, hp, alamat, email) values ('".$nama."','".$username."','".$pass."','".$cp."','".$address."','".$email."')";
            $cek = pg_query($query);
            if($cek)
            {
              echo "<script>
              alert ('Anda berhasil registrasi');
            eval(\"parent.location='login.php'\");
            </script>";
            }
            else{
              echo "gagal";
            }
        }else {
            echo "<script>
                    alert ('Username sudah ada');
                    eval(\"parent.location='regis.php'\");
                    </script>";
        }    
    
?>