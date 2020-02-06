<?php if (isset($_GET['id'])){
                        $id_bbs=$_GET['id'];
?>


 <div class="col-sm-12"> 
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose" style ="background-color: #9e1134">Tambah Paket</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                        <form class="form-horizontal style-form" role="form" action="act/insertpaket.php" method="post">
						            <?php
          $query = pg_query("SELECT MAX(id:: integer) AS id FROM paket");
          $result = pg_fetch_array($query);
          $idmax = $result['id'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;} 
        ?>
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax;?>">
        <input type="text" class="form-control hidden" id="id_bbs" name="id_bbs" value="<?php echo $id_bbs;?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Nama Paket</label>
		      <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="" required>
		       </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Harga Paket</label>
          <div class="col-sm-10">
          <input type="number" class="form-control" name="harga" value="" required>
          </div>
        </div>
		
        <button type="submit" class="btn btn-primary pull-right" style ="background-color: #9e1134">Save <i class="fa fa-floppy-o"></i></button>  
      </form>
<?php } ?>
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>