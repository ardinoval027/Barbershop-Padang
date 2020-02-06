<?php
	// $host = "localhost";
	// $user = "postgres";
	// $pass = "270295";
	// $port = "5432";
	// $dbname = "barbershop";

	$host = "ec2-3-213-192-58.compute-1.amazonaws.com";
	$user = "fddeojebavmbds";
	$pass = "39dd8923bd249db831c6e0b5811459304c81d880c8ac39805900caa74da6c1fe";
	$port = "5432";
	$dbname = "d2q9ocfsgvl44r";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>