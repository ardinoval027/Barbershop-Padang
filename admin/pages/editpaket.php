 <div class="col-sm-12"> <!-- menampilkan form add user-->
        <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose" style ="background-color: #9e1134">Update Paket</a>
                        <div class="box-body" >
             
                      <div class="form-group">
                        <?php if (isset($_GET['id_bbs'])&& isset($_GET['id_paket'])){
          $id_barbershop=$_GET['id_bbs'];
          $id_paket=$_GET['id_paket'];
          $sql = pg_query("SELECT  id,  id_barbershop, nama,  harga_paket FROM paket
            where  id_barbershop='$id_barbershop' and  id='$id_paket' ");

          $data = pg_fetch_array($sql)              
            ?>
        <form class="form-horizontal style-form" role="form" action="act/updatepaketbbs.php" method="post">
        <input type="text" class="form-control hidden" id="id_paket" name="id" value="<?php echo $data['id']?>">
        <input type="text" class="form-control hidden" id="id_barbershop" name="id_barbershop" value="<?php echo $data['id_barbershop']?>">
       
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jumlah">Nama Paket</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']?>" required >
      </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="harga_sewa">Harga Paket</label>
      <div class="col-sm-10">
          <input type="number" class="form-control" name="harga" value="<?php echo $data['harga_paket']?>" required >
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