<div class="col-sm-12"> <!-- menampilkan form add user-->
  <section class="panel">
      <div class="panel-body">
          <a class="btn btn-compose"style ="background-color: #9e1134">Update Admin</a>
          <div class="box-body"	>

        <div class="form-group">
          <?php if (isset($_GET['username']) && (isset($_GET['id_barbershop']))){
					$username=$_GET['username'];
          $id_barbershop=$_GET['id_barbershop'];
          if($id_barbershop == ""){
            $sql = pg_query("SELECT id_barbershop, nama, alamat, hp, role, username, password 
                  FROM accounts where username='$username'");
          }else{
            $sql = pg_query("SELECT id_barbershop, nama, alamat, hp, role, username, password 
                  FROM accounts where id_barbershop='$id_barbershop' and username='$username'");
          }
					
          $data = pg_fetch_array($sql);
          $role = $data['role'];
						?>
<form class="form-horizontal style-form" role="form" action="act/updateuser.php" method="post">
<input type="text" class="form-control hidden" id="id_barbershop" name="id_barbershop" value="<?php echo $data['id_barbershop']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="nama">Nama</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']?>" required>
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="alamat">Alamat</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']?>" required>
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="no_hp">Kontak</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="no_hp" value="<?php echo $data['hp']?>" required>
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="role">Role</label>
		  <div class="col-sm-10">
          <select required name="role" class="form-control">
            <option <?php echo $role=='A' ? "selected" : ""; ?> value="A">Admin</option>
            <option <?php echo $role=='P' ? "selected" : ""; ?> value="P">Admin Barbershop</option>        
          </select>
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="id_barbershop">Barbershop</label>
		  <div class="col-sm-10">
          <select  name="id_barbershop" id="id_barbershop" class="form-control">
		  <option value='0'>None</option>
             <?php
                                
              $barbershop=pg_query("select * from barbershop ");
			  
			  while($bbs = pg_fetch_assoc($barbershop))
              {
        			   if ($data[id_barbershop]==$bbs[id]){
        				echo "<option value=\"$bbs[id]\" selected>$bbs[nama]</option>";}
        				else{
        				echo"<option value=".$bbs['id'].">".$bbs['nama']."</option>";}
        			}             
              ?>                 
          </select>
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="username">Username</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="username" value="<?php echo $data['username']?>" required>
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="password">Password</label>
      <div class="col-sm-10">
        <a data-toggle="modal" data-target="#change_password" class="btn btn-primary" style ="background-color: #9e1134">Change Password</a>
      </div>
        </div>  
        <button type="submit" class="btn btn-primary pull-right"style ="background-color: #9e1134">Save <i class="fa fa-floppy-o"></i></button>  
</form>
<?php } ?>
</div>                   
</div>
</div>
</section>
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="form-modal-add" action="act/change_password.php" method="POST">
            <div class="modal-content">
                <div class="modal-header" style ="background-color: #1685e5">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Change Password</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control hidden" id="location" name="username" value="<?php echo $data['username']?>">
                    <div class="form-group">
                        <label for="new">New Password</label>
                        <input id="new" type="password" class="form-control" name="new" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm">Confirm New Password</label>
                        <input id="confirm" type="password" class="form-control" name="confirm" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary btn-ok" value="Change">
                </div>
            </div>
        </form>
    </div>
</div>
</div>