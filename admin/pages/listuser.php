 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=tambahuser" title="Tambah Admin" class="btn btn-compose"style ="background-color: #9e1134"><i class="fa fa-plus"></i>Tambah User</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>

                        <th>Username</th>
                        <th>Nama</th>
						<th>Kontak Personal</th>
                        <th>Email</th>
                        <th width="200px">Login Terakhir</th>
                        <th width="150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT nama, username, hp, last_login, email  from accounts_pelanggan");
                        while($data =  pg_fetch_array($sql)){
                        $nama = $data['nama'];
						$username = $data['username'];
                        $hp = $data['hp'];
                        $email = $data['email'];
                        $login = $data['last_login'];
                        ?>
                        <tr>
    
                        <td><?php echo "$username"; ?></td>
                        <td><?php echo "$nama"; ?></td>
						<td><?php echo "$hp"; ?></td>
                        <td><?php echo "$email"; ?></td>
                        <td> <?php echo "$login"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=updatepengguna&username=<?php echo $username; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Ubah'><i class="fa fa-edit"></i> Update</a>
                            <a href="act/deluser.php?username=<?php echo $username; ?>&nama=<?php echo $nama; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Delete'><i class="fa fa-trash-o"></i> Delete </a> 
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