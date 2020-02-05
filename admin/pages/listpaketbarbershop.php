<?php if (isset($_GET['id'])){
                        $id=$_GET['id'];
?>

 <div class="col-sm-12"> 
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=addpaket&id=<?php echo $id ?>" title="Tambah Paket" class="btn btn-compose" style ="background-color: #9e1134"><i class="fa fa-plus"></i>Tambah Paket</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th width="150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = pg_query("SELECT * FROM paket WHERE id_barbershop='$id'");
                            while($paket =  pg_fetch_array($sql)){
                            $id_paket= $paket['id'];
                            $nama = $paket['nama'];
                            $harga = $paket['harga_paket'];
                        ?>
                        <tr>
                        <td><?php echo "$nama";?></td>
                        <td><?php echo "Rp. $harga";?></td>
                        <td><div class="btn-group">
                        <a href="?page=editpaket&id_bbs=<?php echo $id; ?>&id_paket=<?php echo $id_paket; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Ubah'><i class="fa fa-edit"></i> Update</a>
                        </div>
                        <div class="btn-group">
                        <a href="act/delpaketbarbershop.php?id_paket=<?php echo $id_paket; ?>&id_bbs=<?php echo $id; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Delete'><i class="fa fa-trash"></i> Delete</a>
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

