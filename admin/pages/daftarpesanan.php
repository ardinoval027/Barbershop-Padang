<?php if (isset($_GET['id'])){
                        // $id=$_GET['id'];
                        $id = $_SESSION['id_barbershop'];

?>

 <div class="col-sm-12"> 
    <section class="panel">
                    <div class="panel-body">
                        <a title="Pesanan" class="btn btn-compose"style ="background-color: #9e1134">Booking</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <!-- <th>ID Booking</th> -->
                        <th>Tanggal Pesan</th>
                        <th>Pemesan</th>
                        <th>Status</th>
                        <th width="150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql2 = pg_query("SELECT b.tgl_booking as tgl, b.jam, b.barber_id, barbershop.nama as barbershop, b.status, 
                        accounts_pelanggan.nama as pelanggan
                        from booking as b
                        left join barber ON barber.barber_id=b.barber_id
                        left join barbershop ON barbershop.id=barber.barber_shop
                        left join accounts_pelanggan on accounts_pelanggan.username = b.username
                        where barbershop.id='$id' and b.status='1'");
                        while($booking = pg_fetch_array($sql2)){
                          $id = $data['id'];
                          $id_barber = $booking['barber_id'];
                          $tgl_booking2 = $booking['tgl']." pukul ".$booking['jam'];
                          $p = $booking['pelanggan'];
                          $status = $booking['status'];
                          $tgl_booking = $booking['tgl'];
                          $jam = $booking['jam'];
                        ?>
                        <tr>
                        
                        <td><?php echo "$tgl_booking2";?></td>
                        <td><?php echo "$p";?></td>
                        <td><?php if($status=='1'){ echo "Belum Dikonfirmasi";}?></td>
                        <td><div class="btn-group">
                        <a href="?page=detailpesanan&barber=<?php echo $id_barber;?>&tgl=<?php echo $tgl_booking;?>&jam=<?php echo $jam;?>" class="btn btn-sm btn-default"  style ="background-color: #9e1134" title='Detail' style="margin-top:0px;"><i class="fa fa-list"></i> Detail</a>
                        </div>
                        <div class="btn-group">
                        <a href="act/delpesanan.php?barber=<?php echo $id_barber;?>&tgl=<?php echo $tgl_booking;?>&jam=<?php echo $jam;?>" class="btn btn-sm btn-default" style ="background-color: #9e1134" title='Hapus'><i class="fa fa-trash"></i> Delete </a>
                        </div>
                        </td>
                        </tr>
                        <?php 
                         } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
                <?php   } ?>

