<?php
    include ('connect.php');
    
	$id_pelanggan = $_POST['id_pelanggan'];
	$id_barbershop = $_POST['id_barbershop'];
    $nilai = $_POST['nilai'];
    
    $querySearch = "SELECT * FROM rating_pelanggan where id_pelanggan='$id_pelanggan' and id_barbershop='$id_barbershop'";
    $search = pg_query($querySearch);
    if(pg_num_rows($search) == 0){
    	$sql = pg_query("insert into rating_pelanggan (id_pelanggan, id_barbershop , nilai) values ('$id_pelanggan', '$id_barbershop', '$nilai')");
    } else {
    	$sql = pg_query("update rating_pelanggan set nilai='$nilai' where id_pelanggan='$id_pelanggan' and id_barbershop='$id_barbershop'");
    }
    
	if ($sql){
		if(!$_SESSION['P']){
		echo "<script>
		alert (' Rating Successfully Set');
		eval(\"parent.location='indexs.php'\");
		</script>";
		}
}else{
	if(!$_SESSION['P']){
		echo "<script>
		alert (' Error ');
		</script>";
		}
}
?>