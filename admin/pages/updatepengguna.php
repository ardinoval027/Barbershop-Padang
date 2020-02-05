<div class="col-sm-12"> <!-- menampilkan form add user-->
		<section class="panel">
      <div class="panel-body">
          <a class="btn btn-compose"style ="background-color: #9e1134">Update Pengguna</a>
          <div class="box-body">

        <div class="form-group">
          <?php if (isset($_GET['username']) ){
					$username=$_GET['username'];
					$sql = pg_query("SELECT  nama, alamat, hp, username, password FROM accounts_pelanggan WHERE username='$username'");
					$data = pg_fetch_array($sql)							
						?>
<form class="form-horizontal style-form" role="form" action="act/updatepengguna.php" method="post">
<input type="text" class="form-control hidden" id="id_barbershop" name="id_barbershop" value="<?php echo $data['id_barbershop']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="nama">Nama</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="alamat">Alamat</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="no_hp">Kontak</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="no_hp" value="<?php echo $data['hp']?>">
		    </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="username">Username</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="username" value="<?php echo $data['username']?>">
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
</div>
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="form-modal-add" action="act/ubah_password.php" method="POST">
            <div class="modal-content">
                <div class="modal-header" style ="background-color: #1685e5">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
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