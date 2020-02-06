 <div class="col-sm-12"> <!-- menampilkan form add user-->
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose"style ="background-color: #9e1134">Add Admin</a>
                        <div class="box-body"	>
             
<div class="form-group">

        <form class="form-horizontal style-form" role="form" action="act/insertadmin.php" method="post">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Nama</label>
		      <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="">
		      </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Alamat</label>
		      <div class="col-sm-10">
          <input type="text" class="form-control" name="alamat" value="">
		       </div>
        </div>
    <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Email</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="email" value="">
          </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Kontak</label>
		      <div class="col-sm-10">
          <input type="text" class="form-control" name="no_hp" value="">
		       </div>
      </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Role</label>
		      <div class="col-sm-10">
          <select required name="role" class="form-control">
            <option value="P">Admin Barbershop</option>
            <option value="A">Admin</option>                             
          </select>
		      </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="id_barbershop">Barbershop</label>
		        <div class="col-sm-10">
          <select  name="id_barbershop" id="id_barbershop" class="form-control">
		      <option value= >None</option>
             <?php                   
              $barbershop=pg_query("select * from barbershop ");
              while($bbs = pg_fetch_assoc($barbershop)){
              echo"<option value=".$bbs['id'].">".$bbs['nama']."</option>";
              } 
              ?>                              
          </select>
		     </div>
    </div>
    <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Username</label>
		      <div class="col-sm-10">
          <input type="text" class="form-control" name="username" value="">
		      </div>
    </div>
    <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="pass">Password</label>
		      <div class="col-sm-10">
          <input type="password" class="form-control" name="password" value="">
		      </div>
    </div>  
        <button type="submit" class="btn btn-primary pull-right" style ="background-color: #9e1134">Save <i class="fa fa-floppy-o"></i></button>  
</form>

</div>                   
</div>
</div>
</section>
</div>
