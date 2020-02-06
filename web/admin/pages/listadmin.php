 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=user" title="Tambah Admin" class="btn btn-compose"><i class="fa fa-plus"></i>Tambah Admin</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>

                        <th>Username</th>
                        <th>Nama</th>
                        <th>Kontak Personal</th>
                        <th>Login Terakhir</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT nama, username, hp, last_login  from accounts  where role='A'");
                        while($data =  pg_fetch_array($sql)){
                        $nama = $data['nama'];
                        $username = $data['username'];
                        $hp = $data['hp'];
                        $login = $data['last_login'];
                        ?>
                        <tr>
    
                        <td><?php echo "$username"; ?></td>
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$hp"; ?></td>
                        <td> <?php echo "$login"; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                      </div>                   
                     </div>
                    </div>
                </section>
                 </div>