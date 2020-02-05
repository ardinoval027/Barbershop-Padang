<?php 
include ('inc/connect.php');

		$sql = "SELECT(select count(*) from accounts where role='A' ) as admin";
				$query = pg_query($sql);
		
		if(pg_num_rows($query)>0){
			$data1= pg_fetch_assoc($query);
			return $data1;
		}
?>