  <?php
require 'act/viewdatabbs.php';
  ?>
		 			
                  <div class="col-lg-12">
					<div class="row content-panel">
						<div class="col-md-4 profile-text mt mb centered">
							<div class="right-divider hidden-sm hidden-xs">
								<img src="../foto/<?php echo "$image"; ?>" style="width:50%;;">
							</div>
						</div>
						
						<div class="col-md-4 profile-text">
							<h3><b> <?php echo $barbershop_name ?></b></h3>
							<p><?php echo $address ?></p>
							<p><?php echo $contact ?></p>
							<br>
						</div>
						
						<div class="col-md-4 centered">
							<div class="profile-pic">
							</div>
						</div>
					</div>	   
          		</div>

          		
          		<div class="col-lg-6 mt">
          		<div class="row content-panel">
          		<div class="col-lg-9 col-lg-offset-2 detailed">
                  <h4>INFORMASI</h4>
							<table class="table table-stripped">
					<tbody  style='vertical-align:top;'>

						<tr><td><b>Administrator<b> </td><td>: </td><td><?php echo $admin_name ?></td></tr>
				
						<tr><td><b>Koordinat<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>	
					</tbody>
					
				</table>
                      </div>
                      </div>
                      </div>

			  
			  
			  <div class="col-lg-6 mt">
          		<div class="row content-panel">
          		<div class="col-lg-8 col-lg-offset-2 detailed">
                  <h4>Galeri <?php echo $barbershop_name ?></h4>
				  <br>
				  <div class="box-body" style="max-height:720px;overflow:auto;">
					<?php $id=$_SESSION['id_barbershop'] ?>
						<?php
						$querysearch="SELECT gallery_barbershop FROM barbershop_gallery where id='$id_barbershop'";

						$hasil=pg_query($querysearch);
						 
						 while($baris = pg_fetch_array($hasil))
						 {
						 	?>
							<div class="col-sm-20">
									<image src="../foto/<?php echo $baris['gallery_barbershop']; ?>" style="width:100%; padding:3px">
									</div>
								<?php
						 }
						?>
						<br>
						 </div>
						 </div>
                      
                      </div>
                      </div>

         