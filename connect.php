<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "270295";
	$port = "5432";
	$dbname = "barbershop";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>