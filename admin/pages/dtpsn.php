<?php 
$barber = $_GET["barber"];
$tgl = $_GET["tgl"];
$jam = $_GET["jam"];
$sql = pg_query("SELECT c.barber_nama, b.barber_id, b.tgl_booking, a.nama as pemesan, a.hp, p.nama as barbershop,b.jam as jam, b.status,
t.nama as paketnya, t.harga_paket as harganya
FROM booking as b 
left join accounts_pelanggan as a on a.username=b.username 
left join barber as c on c.barber_id=b.barber_id
left join barbershop as p on p.id=c.barber_shop
left join paket as t on t.id=b.id_paket
where b.barber_id='$barber' and b.tgl_booking='$tgl' and b.jam='$jam'");


while($row = pg_fetch_array($sql)){
  $hp=$row['hp'];
  $status=$row['status'];
  $tgl_booking=$row['tgl_booking'];
  $jam=$row['jam'];
  $barbershop=$row['barbershop'];
  $nama_pemesan=$row['pemesan'];
  $barber_nama=$row['barber_nama'];
  $id=$row['barber_id'];
  $paketnya=$row['paketnya'];
  $harganya=$row['harganya'];
  $th[$i] = $rows['harga'];
}
?>


<div class="col-sm-12"> 
    <section class="panel">
      <div class="panel-body">
        <a class="btn btn-compose"style ="background-color: #9e1134">Detail Pesanan</a>
        <div class="box-body">
            <div class="col-sm-12"> <!-- menampilkan data pemesan-->
              <section class="panel">
                <header class="panel-heading">
                  <label style="color: black">Data Pemesan</label>  
                </header>
                <div class="panel-body">
                  <table class="table">
                  <tbody>
                    <!-- <tr><td>ID </td><td>: <?php echo "$id"; ?></td></tr> -->
                    <tr><td>Nama </td><td>: <?php echo "$nama_pemesan"; ?></td></tr>
                    <tr><td>Hp</td><td>: <?php echo "$hp"; ?></td></tr>
                    <tr><td>Tanggal dan Waktu Pesan </td><td>: <?php echo "$tgl_booking"; ?> <?php echo "$jam"; ?></td></tr>
                    <tr><td>Status </td><td>: <?php if($status==2){echo "Dikonfirmasi";}else if($status==3){echo "Batal";} ?></td></tr>
                    <tr><td>Barber</td><td>: <?php echo "$barber_nama"; ?></td></tr>
                    <tr><td>Paket</td><td>: <?php echo "$paketnya"; ?></td></tr>
                    <tr><td>Harga Paket</td><td>: <?php echo "$harganya"; ?></td></tr>
                  </tbody>
                </table>
                </div>
              </section>
            </div>
        </div>
        
      </div>
    </section>
</div>
<?php 

?>

<script type="text/javascript">
window.onload=init;
var centerBaru;
var map;

function init(){
    basemap();
    cari_pesanan();
}
function basemap(){
    map = new google.maps.Map(document.getElementById('map'), 
        {
          zoom: 13.2,
          center: new google.maps.LatLng(-0.924140, 100.403460),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        });

}
function cari_pesanan() 
{
  var id = <?php echo $id; ?>;
  var latitude = <?php echo $lat; ?>;
  var longitude = <?php echo $lng; ?>;
  centerBaru = new google.maps.LatLng(latitude, longitude);
  marker = new google.maps.Marker({
    position: centerBaru,
    map: map,
    animation: google.maps.Animation.DROP,
  });
  infowindow = new google.maps.InfoWindow({
              position: centerBaru,
              content: "<a style='color:black;'>Lokasi Pesta</a> "
              });
  map.setZoom(13);
  infowindow.open(map, marker);
 map.setCenter(centerBaru);
}


</script>