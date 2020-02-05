<?php if (isset($_GET['id'])){
                        $id=$_GET['id'];
                        $id_barber=$_SESSION['id_barbershop'];
?>

 <div class="col-sm-12"> 
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=addbarber&id=<?php echo $id ?>" title="Tambah Paket" class="btn btn-compose" style ="background-color: #9e1134"><i class="fa fa-plus"></i>Tambah Barber</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>ID</th>    
                        <th>Nama</th>                        
                        <th width="150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = pg_query("SELECT * FROM barber WHERE barber_shop='$id_barber'");
                            while($paket =  pg_fetch_array($sql)){
                            $id_paket= $paket['barber_id'];
                            $nama = $paket['barber_nama'];
                        ?>
                        <tr>
                        <td><?php echo "$id_paket";?></td>
                        <td><?php echo "$nama";?></td>
                        <td><div class="btn-group">
                        <a href="?page=editbarber&id_barber=<?php echo $paket['barber_id']; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Ubah'><i class="fa fa-edit"></i> Update </a>
                        </div>
                        <div class="btn-group">
                        <a href="act/delbarber.php?id_barber=<?php echo $paket['barber_id'];; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Delete'><i class="fa fa-trash-o"></i> Delete </a>
                        </div>
                        </td>
                        </tr>
                        <?php   } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
                <?php   } ?>

