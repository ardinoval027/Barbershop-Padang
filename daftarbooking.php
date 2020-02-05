<!DOCTYPE html>
<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['C'])){
  echo"<script language='JavaScript'>document.location='disable.php'</script>";
    exit();
}
$username=$_SESSION['username'];

?>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM2fDXHmGzCDmDBk3bdPIEjs6zwnI1kGQ&libraries=drawing"></script> -->

    <title>WebGIS</title>

   <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  <script src="inc/script.js" type="text/javascript"></script>
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM2fDXHmGzCDmDBk3bdPIEjs6zwnI1kGQ&libraries=drawing"></script>
    <script src="assets/js/chart-master/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datetimepicker/datertimepicker.html" />
    <link rel="stylesheet" type="text/css" href="../assets/css/skin/_all-skins.css" />
  
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
              <div class="col-sm-12">  
               <section class="panel">
                    <div class="panel-body">
                       <a title="riwayatbooking" class="btn btn-compose"style ="background-color: #9e1134">Riwayat Booking</a>
                       <div class="box-body">
                       <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>Tanggal Booking</th>
                        <th>Barbershop</th>
                        <th>Status Booking</th>
                        <th width="150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT b.tgl_booking, b.jam, b.barber_id, barbershop.nama as barbershop, b.status from booking as b
                                          left join barber ON barber.barber_id=b.barber_id
                                          left join barbershop ON barbershop.id=barber.barber_shop
                                          where b.username='$username' and status='1'");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id'];
                        $id_barber = $data['barber_id'];
                        $jam = $data['jam'];
                        $tgl_booking = $data['tgl_booking'];
                        $barbershop = $data['barbershop'];
                        $status = $data['status'];
                        ?>
                        <tr>
                        
                        <td><?php echo "$tgl_booking"; ?></td>
                        <td><?php echo "$barbershop"; ?></td>
                        <td> <?php if($status=='1'){ echo "Belum Dikonfirmasi";} ?></td>
                        <td><div class="btn-group">
                        <a href="detailbooking.php?barber=<?php echo $id_barber;?>&tgl=<?php echo $tgl_booking;?>&jam=<?php echo $jam;?>" class="btn btn-sm btn-default" style="background-color: #9e1134" title='Detail'><i class="fa fa-list"></i> Detail</a>
                        </div>
                        <div class="btn-group">
                        <a href="admin/act/delpesanan.php?barber=<?php echo $id_barber;?>&tgl=<?php echo $tgl_booking;?>&jam=<?php echo $jam;?>" class="btn btn-sm btn-default" style="background-color: #9e1134" title='Hapus'><i class="fa fa-trash"></i> Hapus</a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>

                      </div>                   
                     </div>
                    </div>
                  </section>
              </div>
        </div>
       </section>   
      </section>    
</section>

    <!-- js placed at the end of the document so the pages load faster -->
    
    <script src="scriptss.js" type="text/javascript"></script>
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
  
  <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function () {
        $('#example1, #example2, #example3').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false,
      "iDisplayLength": 10,
      "oLanguage": {
       "sInfo": "Showing _START_ to _END_ of _TOTAL_ entires",
       "sLengthMenu": "Show _MENU_ entires",
       "sSearch": "Search:"
      }
        });
      });
    </script>
</body>
</html>
