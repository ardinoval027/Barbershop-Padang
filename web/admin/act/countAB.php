<?php 
include ('inc/connect.php');

		$sql = "SELECT(select count(*) from accounts where role='P' ) as AdminBarbershop";
				$query = pg_query($sql);
		
		if(pg_num_rows($query)>0){
			$data2 = pg_fetch_assoc($query);
			return $data2;
		}
?>