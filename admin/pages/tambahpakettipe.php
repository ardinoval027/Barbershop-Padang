<?php if (isset($_GET['id_paket'])){
	$id_paket=$_GET['id_paket'];
  $id_bbs=$_GET['id_bbs'];
?>
			  
<div class="col-sm-12"> 
<section class="panel">
<div class="panel-body">
<a class="btn btn-compose"> Barang</a>
<div class="box-body">
<div class="form-group">
<form role="form" action="act/tambahbrgpkt.php" method="post">
<input type="text" class="form-control hidden" id="id_paket" name="id_paket" value="<?php echo $id_paket ?>">
<input type="text" class="form-control hidden" id="id_bbs" name="id_bbs" value="<?php echo $id_bbs ?>">
<div class="form-group">
  <?php
			$sql2 = pg_query("select * from tipe order by nama");
      
			while($tipe = pg_fetch_array($sql2)){
        $id_tipe=$tipe['id'];
				$sql3 = pg_query ( "SELECT * FROM detail_paket where id_paket='$id_paket' and id_tipe='$id_tipe'");
				$dt_paket = pg_fetch_array($sql3);
				if($tipe['id']==$dt_paket['id_tipe']){
					echo"<table class='table table-hover table-bordered table-striped'>
                <tbody><tr><td><div class='checkbox'><label><input name='tipe[]' value='$id_tipe' type='checkbox' checked disabled>$tipe[nama]
                       </label></div> </tr></tbody></table>";
				}else{
				echo "<table class='table table-hover table-bordered table-striped'>
                <tbody><tr><td><div class='checkbox'><label><input name='tipe[]' value='$id_tipe' type='checkbox'>$tipe[nama]</label</div></td></tr></tbody>
                </table>";
			}
			}
		?>
</div>
<button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>   
</form> 
</div>                   
</div>
</div>
</section>

</div>
<?php } ?>