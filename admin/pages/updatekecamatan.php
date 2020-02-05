 <div class="col-sm-12"> <!-- menampilkan form add user-->
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Update Data Ustad</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
					     <?php  if (isset($_GET['id'])){
					$id=$_GET['id'];
					$sql = pg_query("SELECT id, name, geom FROM district where id='$id'");
					$data = pg_fetch_array($sql)
				?> 	
                        
                        <form class="form-horizontal style-form" role="form" action="act/updatekec.php" method="post">
		<input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $data['id']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label"><span style="color:red">*</span>Name</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?php echo $data['name']?>">
		   </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" ><span style="color:red">*</span>geom</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="geom" >
       </div>
        </div>
        
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>  
</form>
<?php } ?>
         </div>                   
         </div>
         </div>
         </section>
         </div>