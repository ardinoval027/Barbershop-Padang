<?php 
include ('inc/connect.php');

		$sql = "SELECT(select count(*) from booking) as booking";
				$query = pg_query($sql);
		
		if(pg_num_rows($query)>0){
			$data4 = pg_fetch_assoc($query);
			return $data4;
		}
?>


	
	