 <div class="col-sm-12"> <!-- menampilkan form add user-->
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Add Data Kecamatan</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                        
                        <form class="form-horizontal style-form" role="form" action="act/addkec.php" method="post">
						<?php
          $query = pg_query("SELECT MAX(id) AS id FROM district");
          $result = pg_fetch_array($query);
          $idmax = $result['id'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
		<input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax;?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="nama"><span style="color:red">*</span>Name</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="">
		   </div>
        </div>
  		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="no_hp"><span style="color:red"></span>Geom</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="geom" value="">
		   </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>  
</form>
         </div>                   
         </div>
         </div>
         </section>
         </div>