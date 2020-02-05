<?php
session_start();
?>
<div class="col-sm-12"> <!-- menampilkan form add event-->
    <section class="panel">
        <div class="panel-body">
            <a class="btn btn-compose" style ="background-color: #9e1134">Change Password <?php echo $_SESSION['username'] ?></a>
            <div class="box-body"	>
                <div class="form-group">
                        <form class="form-horizontal style-form" role="form" action="act/changepass.php" method="post">
                  				<input type="text" class="form-control" name="user" value="<?php echo $_SESSION['username'] ?>">
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" for="passlama"><span style="color:red">*</span>Password Lama</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="passlama" value="" placeholder="*****" required>
                          </div>
                          </div> 
                  		<div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" for="passbaru"><span style="color:red">*</span>Password Baru</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="passbaru" value="" placeholder="*****" required>
                          </div>
                          </div> 
                  		<div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" for="konfirm"><span style="color:red">*</span>Konfirmasi Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="konfirm" value="" placeholder="*****" required>
                          </div>
                          </div> 
                          <button type="submit" class="btn btn-primary pull-right" style ="background-color: #9e1134" onclick="show1()">Ganti <i class="fa fa-floppy-o"></i></button>  
                      </form>

                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>