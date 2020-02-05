<div class="col-sm-6"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>                    
          <input id="latlng" type="text" class="form-control" style="width:200px" value="" placeholder="Latitude, Longitude">
          <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button> </h3>
              
                      </header>
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:420px; z-index:50"></div>
                      </div>
                  </section>
              </div>
			  
			  <div class="col-sm-6"> <!-- menampilkan form add mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose" style ="background-color: #9e1134">Update Informasi Barbershop</a>
                        <div class="box-body">
             
                      <div class="form-group" id="hasilcari1">
					  <?php if (isset($_GET['id'])){
				$id=$_GET['id'];
				$sql = pg_query("SELECT id, nama, alamat, ST_AsText(geom) as geom, image, kontak FROM barbershop where id='$id'");
				$data =  pg_fetch_array($sql);
			?>
                         <form role="form" action="act/updatebbs.php" enctype="multipart/form-data" method="post">
                         
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id ?>">
        <div class="form-group">
          <label for="geom">Koordinat</label>
          <textarea class="form-control" id="geom" name="geom" readonly><?php echo $data['geom'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="nama">Nama Barbershop</label>
          <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']?>" required>
        </div>
        
        <div class="form-group">
          <label for="kontak">Kontak</label>
          <input type="text" class="form-control" name="kontak" value="<?php echo $data['kontak']?>" required>
        </div>

        
         <div class="form-group">
                                  <label class="control-label col-md-3">Image Upload</label>
                                  <div class="col-md-9">
                  
                                      <div class="fileupload fileupload-new" data-provides="fileupload">
                                          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                              <img src="../foto/no.png" alt="" />
                                          </div>
                                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                          <div>
                                              <span class="btn btn-theme02 btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" class="default" name="image" />
                        </span>
                                              <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                          </div>
                                      </div>
                                      <span class="label label-danger">NOTE!</span>
                                     <span>
                    Maximum image size of 500KB
                                     </span>
                                  </div>
                              </div>
        <button type="submit" class="btn btn-primary pull-right" style ="background-color: #9e1134">Save <i class="fa fa-floppy-o"></i></button>   
</form> 
<?php  }  ?>
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
         <script src="inc/mapupd.js" type="text/javascript"></script>