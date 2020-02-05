<div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=addbarbershop" title="Add Barbershop" class="btn btn-compose" style ="background-color: #9e1134"><i class="fa fa-plus"></i>Barbershop</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example2" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Barbershop</th>
                        <th>Alamat</th>
                        <th>Kontak Barbershop</th>
                        <th class="col-md-2 col-xs-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT * FROM barbershop");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id'];
                        $nama = $data['nama'];
                        $alamat = $data['alamat'];
                        $kontak = $data['kontak'];
                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$alamat"; ?></td>
                        <td><?php echo "$kontak"; ?></td>
                        <td><div class="btn-group" role="group">
						            <a href="?page=detail&id=<?php echo $id; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Detail'><i class="fa fa-list"></i> Detail</a>
						            </div>
                        <div class="btn-group" role="group">
                        <a href="act/delbarbershop.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Delete'><i class="fa fa-trash"></i> Delete</a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
         