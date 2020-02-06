<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['C'])){
	echo"<script language='JavaScript'>document.location='login.php'</script>";
	  exit();
}
include 'connect.php';

$username=$_SESSION['username'];

?>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>WebGIS</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/datertimepicker.html" />
  <link rel="stylesheet" href="assets/css/bootstrap-slider.css" type="text/css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
    <script src="assets/js/chart-master/Chart.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  
  </head>

  <body>

   <section id="container" >
      <header class="header black-bg">
             
            <a class="logo"><p><b style="font-size: 17px">BARBERSHOP</b></p></a>
            <ul class="nav pull-right top-menu">
                  <a href="admin/act/logout.php" class="logo" style="font-size:14px"><i class="fa fa-sign-in"></i>
                   <b>Logout</b></a>
              </ul>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
               <ul class="sidebar-menu" id="nav-accordion">
              
                 <p class="centered"><a href=""><img src="assets/img/fr-05.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><p><?php echo $_SESSION['name']; ?></p></h5>
                  <li class="sub-menu">
                      <a href="indexs.php">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-book"></i>
                          <span>Riwayat Booking</span>
                      </a>
                      <ul class="sub">
                           <li class="sub-menu">
                            <a href="daftarbooking.php">
                                <i class="fa fa-book"></i>
                                <span>Booking</span>
                            </a>
                          </li>
                          <li class="sub-menu">
                            <a href="daftarbookingkonfirm.php">
                                <i class="fa fa-book"></i>
                                <span>Booking dikonfirmasi</span>
                            </a>
                          </li>    
                      </ul>
                  </li>
             </ul>
          </div>
      </aside>
      <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row mt">
<?php 

$barber = $_GET["barber"];
$tgl = $_GET["tgl"];
$jam = $_GET["jam"];
$sql = pg_query("SELECT c.barber_nama, b.tgl_booking, a.nama as pemesan, a.hp, p.nama as barbershop,b.jam as jam, b.status,
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
  $id=$row['id'];
  $paketnya=$row['paketnya'];
  $harganya=$row['harganya'];
  $th[$i] = $rows['harga'];
}
?>


<div class="col-sm-12"> 
    <section class="panel">
      <div class="panel-body">
        <a class="btn btn-compose" style ="background-color: #9e1134">Detail Pesanan</a>
        <div class="box-body">
            <div class="col-sm-4"> <!-- menampilkan data pemesan-->
              <section class="panel">
                <header class="panel-heading">
                  <label style="color: black"><h4>Data Pemesan</h4></label>  
                </header>
                <div class="panel-body">
                  <table class="table table-striped">
                    <tbody>
                      
                      <tr><td>Nama </td><td>: <?php echo "$nama_pemesan"; ?></td></tr>
                      <tr><td>Hp</td><td>: <?php echo "$hp"; ?></td></tr>
                      <tr><td>Barbershop</td><td>: <?php echo "$barbershop"; ?></td></tr>
                      <tr><td>Barber</td><td>: <?php echo "$barber_nama"; ?></td></tr>
                      <tr><td>Tanggal Booking </td><td>: <?php echo "$tgl_booking"; ?></td></tr>
                      <tr><td>Jam Booking </td><td>: <?php echo "$jam"; ?></td></tr>
                      <tr><td>Status </td><td>: <?php if($status==1){echo "Belum Dikonfirmasi";}else if($status==2){echo "Dikonfirmasi";}else if($status==3){echo "Batal";} ?></td></tr>
                    </tbody>
                  </table>
          
                </div>
              </section>
            </div>
            
        </div>
        <div class="form-group">
         <table class="table table-hover table-bordered table-striped">
          <thead>
          <tr>
          <th>Pesanan</th>
          <th>Harga</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?php echo $paketnya ?></td>
            <td><?php echo $harganya ?></td>
          </tr>          
          </tbody>
          </table>
        </div>
        
      </div>
    </section>
</div>
<?php 

?>

              

        </div>
    </section>     
    </section>
      
  </section>

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
  var geocoder = new google.maps.Geocoder;
  centerBaru = new google.maps.LatLng(latitude, longitude);
  geocoder.geocode({'location': centerBaru}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(11);
              var marker = new google.maps.Marker({
                position: centerBaru,
                map: map,
                animation: google.maps.Animation.DROP,
              });
              var infowindow = new google.maps.InfoWindow;
              infowindow.setContent("Lokasi Pesta");
              var lokasi = results[0].formatted_address;
              var lokasii = document.getElementById('lokasi');
              lokasii.innerHTML = lokasi;
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
  console.log(id);
  console.log(latitude);
  console.log(longitude);
  map.setZoom(13);
  infowindow.open(map, marker);
  map.setCenter(centerBaru);
}

</script>    
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    
    <script src="assets/js/common-scripts.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-slider.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <script type="text/javascript" src="assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="assets/js/advanced-form-components.js"></script>  


</body>
</html>
