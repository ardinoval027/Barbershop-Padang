 <div class="col-sm-12"> 
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=tambahtipe" title="Tambah Tipe Sewa" class="btn btn-compose"><i class="fa fa-plus"></i>Tambah Tipe Sewa</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <!-- <th>ID</th> -->
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th width="200px">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("select id, nama, satuan  from tipe");
                        while($data =  pg_fetch_array($sql)){
						$id = $data['id'];
                        $nama = $data['nama'];
                        $satuan = $data['satuan'];
                        ?>
                        <tr>
                       <!--  <td><?php echo "$id"; ?></td> -->
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$satuan"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=tipesewaupdate&id=<?php echo $id; ?>&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Ubah'><i class="fa fa-edit"></i> Update</a>
						<a href="act/deltipesewa.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
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