<div class="col-sm-12"> <!-- menampilkan form add user-->
        <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose"style ="background-color: #9e1134">Update Barber</a>
                        <div class="box-body" >
             
                      <div class="form-group">
                        <?php if (isset($_GET['id_barber'])){
          $id_barber=$_GET['id_barber'];
          $sql = pg_query("SELECT * FROM barber where barber_id='$id_barber'");

          $data = pg_fetch_array($sql)              
            ?>
        <form class="form-horizontal style-form" role="form" action="act/updatebarber.php" method="post">
        <input type="text" class="form-control hidden" id="id_barber" name="id" value="<?php echo $data['barber_id']?>">
        
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" for="nama">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="<?php echo $data['barber_nama']?>" >
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