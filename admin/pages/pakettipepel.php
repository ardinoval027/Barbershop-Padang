 <div class="col-sm-12"> <!-- menampilkan form add user-->
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Update Tipe Sewa</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                        <?php if (isset($_GET['id_paket'])&& isset($_GET['id_tipe'])&& isset($_GET['id_paket'])){
					$id_paket=$_GET['id_paket'];
          $id_tipe=$_GET['id_tipe'];
          $id_bbs=$_GET['id_bbs'];
					$sql = pg_query("SELECT  id_tipe,  id_paket, jumlah FROM detail_paket
            where  id_paket='$id_paket' and  id_tipe='$id_tipe' ");

          $data = pg_fetch_array($sql)							
						?>
        <form class="form-horizontal style-form" role="form" action="act/updatepktsewa.php" method="post">
        <input type="text" class="form-control hidden" id="id_tipe" name="id_tipe" value="<?php echo $data['id_tipe']?>">
        <input type="text" class="form-control hidden" id="id_paket" name="id_paket" value="<?php echo $data['id_paket']?>">
        <input type="text" class="form-control hidden" id="id_bbs" name="id_bbs" value="<?php echo $id_bbs?>">

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jumlah">Jumlah</label>
      <div class="col-sm-10">
          <input type="number" class="form-control" name="jumlah" value="<?php echo $data['jumlah'];?>" >
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