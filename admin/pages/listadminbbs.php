 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=user" title="Tambah Pengurus" class="btn btn-compose"style ="background-color: #9e1134"><i class="fa fa-plus"></i>Tambah Admin</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>

                        <th>Username</th>
                        <th>Nama</th>
						<th>Barbershop</th>
                        <th>Role</th>
                        <th width="200px">Login Terakhir</th>
                        <th width="150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $sql = pg_query("SELECT a.nama as admin_name,  a.username, a.role, b.nama as barbershop_name, a.id_barbershop,  
                                        a.last_login from accounts as a
                                        left join barbershop as b on b.id=a.id_barbershop where a.role!='C' ");
                        while($data =  pg_fetch_array($sql)){
                        $id_bbs = $data['id_barbershop'];
                        $barbershop = $data['barbershop_name'];
                        $role = $data['role'];
                        $username = $data['username'];
                        $nama = $data['admin_name'];
                        $login = $data['last_login'];
                        ?>
                        <tr>
    
                        <td><?php echo "$username"; ?></td>
                        <td><?php echo "$nama"; ?></td>
						<td><?php if(!$barbershop){echo "Super Admin";} else {echo "$barbershop";} ?></td>
                        <td><?php if($role=='A'){echo "Admin";} else if($role=='P'){echo "Admin Barbershop";} ?></td>
                        <td ><?php echo "$login"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=userupdate&username=<?php echo $username; ?>&id_barbershop=<?php echo $id_bbs; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Ubah'><i class="fa fa-edit"></i> Update</a>
						</div>
                        <div class="btn-group">
                        <a href="act/delbbs.php?username=<?php echo $username; ?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Delete'><i class="fa fa-trash-o"></i> Delete</a>
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