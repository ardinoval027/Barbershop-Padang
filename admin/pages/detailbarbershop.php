 <?php
require 'inc/connect.php';
$id_bbs = $_GET["id"];
$query = "SELECT barbershop.id, barbershop.nama as barbershop_name, barbershop.alamat, barbershop.image, accounts.nama as admin_name, 
			ST_X(ST_Centroid(geom)) As lng, ST_Y(ST_Centroid(geom)) As lat FROM barbershop 
			join accounts on accounts.id_barbershop=barbershop.id where barbershop.id='$id_bbs'";
$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
  $id=$row['id'];
  $barbershop_name=$row['barbershop_name'];
  $address=$row['alamat'];
  $admin_name=$row['admin_name'];
  $image=$row['image'];
  $lat=$row['lat'];
  $lng=$row['lng'];
  if ($lat=='' || $lng==''){
    $lat='<span style="color:red">Kosong</span>';
    $lng='<span style="color:red">Kosong</span>';
  }
    if ($image=='null' || $image=='' || $image==null){
    $image='foto.jpg';
  }
}
  ?>
		
 
  <div class="col-sm-6"> 
                  <section class="panel">
                      <header class="panel-heading">
						<h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $barbershop_name ?></b></h2>
              
                      </header>
                      <div class="panel-body">
							<table>
					<tbody  style='vertical-align:top;'>
						<tr><td width="150px"><b>Alamat</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
						<tr><td><b>Administrator<b> </td><td>: </td><td><?php echo $admin_name ?></td></tr>
						<tr><td><b>Koordinat<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>
						
					</tbody>
					
				</table>
				<div class="btn-group">
						<a href="?page=updatebarbershop&id=<?php echo $id_bbs ?>" class="btn btn-default" style ="background-color: #9e1134; color : white"><i class="fa fa-edit"></i>&nbsp Edit Information</a>
				</div>
                      </div>

</section>
	</div>
	
	<div class="col-sm-5"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3> Galeri <?php echo $barbershop_name ?></h3>
              
                      </header>
                      <div class="panel-body">
							<?php
							$querysearch="SELECT gallery_barbershop FROM barbershop_gallery where id='$id_bbs'";

							$hasil=pg_query($querysearch);
							 
							 while($baris = pg_fetch_array($hasil))
							 {
							 	
							 	//echo $baris['gallery_culinary'];
							 	?>
										<image src="../foto/<?php echo $baris['gallery_barbershop']; ?>" style="width:10%;">
									<?php
							 }
							?>
                      </div>
					  
					  
                  </section>
              </div>
			  <div class="col-sm-5"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>Upload Galeri <?php echo $barbershop_name ?></h3>
              
                      </header>
                      <div class="panel-body">
						<form role="form" action="act/uploadfotobbs.php" enctype="multipart/form-data" method="post">
						  <div class="box-body">
							
							<input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
							<div class="form-group">
							 <input type="file" class="" style="background:none;border:none; width:300px; " name="image" required>
							</div>
							<span style="color:red;">*Maximum image size 500kb</span>
						  </div><!-- /.box-body -->

						  <div class="box-footer">
							<button type="submit" class="btn btn-primary" style ="background-color: #9e1134"><i class="fa fa-upload"></i> Upload</button>
						  </div>
						</form>
                      </div>
					  
					  
                  </section>
              </div>
                  
              