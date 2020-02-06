<?php if (isset($_GET['id_paket'])&& isset($_GET['id_bbs'])){
	$id_paket=$_GET['id_paket'];
  $id_bbs=$_GET['id_bbs'];
?>

 <div class="col-sm-12"> 
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=tambahpakettipe&id_bbs=<?php echo $id_bbs; ?>&id_paket=<?php echo $id_paket ?>" title="Tambah Tipe Sewa" class="btn btn-compose"><i class="fa fa-plus"></i>Tambah Tipe Sewa</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th width="150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql2 = pg_query("select * from tipe order by nama");
                        while($tipe = pg_fetch_array($sql2)){
                            $id_tipe=$tipe['id'];
                            $sql3 = pg_query ( "SELECT * FROM detail_paket where id_paket='$id_paket' and id_tipe='$id_tipe'");
                            $dt_paket = pg_fetch_array($sql3);
                        if($tipe['id']==$dt_paket['id_tipe']){
                        ?>
                        <tr>
                        <td><?php echo "$tipe[nama]";?></td>
                        <td><?php echo "$dt_paket[jumlah]";?></td>
                        <td><div class="btn-group">
                        <a href="?page=pakettipebbs&id_bbs=<?php echo $id_bbs; ?>&id_paket=<?php echo $id_paket; ?>&id_tipe=<?php echo $dt_paket['id_tipe']; ?>" class="btn btn-sm btn-default" title='Ubah'><i class="fa fa-edit"></i> Update</a>
                        <a href="act/delpakettipe.php?id_paket=<?php echo $id_paket; ?>&id_tipe=<?php echo $dt_paket['id_tipe']; ?>&id_bbs=<?php echo $id_bbs; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
                        </div>
                        </td>
                        </tr>
                        <?php 
                        }
                        } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
                <?php   } ?>