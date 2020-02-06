<!DOCTYPE html>
<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['C'])){
  echo"<script language='JavaScript'>document.location='login.php'</script>";
    exit();
}
$id_barbershop=$_GET['id_bbs'];

?>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM2fDXHmGzCDmDBk3bdPIEjs6zwnI1kGQ&libraries=drawing"></script> -->

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&libraries=drawing"></script>
    <script src="assets/js/chart-master/Chart.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  
  </head>

  <body>

   <section id="container" >
      <header class="header black-bg">
             
            <a class="logo"><p><b style="font-size: 17px">BarberShop</b></p></a>
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
                      <a href="daftarbooking.php">
                          <i class="fa fa-user"></i>
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
              <div class="col-sm-12" id="hide2"> <!-- menampilkan peta-->
                  <section class="panel">

                      <header class="panel-heading">
                      
                    
                      </header>
                     

                    <div class="panel-body">
                        <div class="box-body">
                        <div class="form-group" id="hasilcari1">
                        <form role="form" onSubmit="return confirm('Apakah sudah yakin dengan pilihan anda?');" action="booked.php" enctype="multipart/form-data" method="post">

                            <?php 
                            $tgl=date('dmY');
                            include 'connect.php';
                                  $id = $result['id_booking'];
                                  $idmax = substr($id, 8);
                                  if ($idmax==null) {$idmax=1; $idmax=str_pad($idmax, 3, '0', STR_PAD_LEFT);}
                                  else {$idmax++; $idmax=str_pad($idmax, 3, '0', STR_PAD_LEFT);}
                                  

                            $id_booking = $tgl.$idmax;
                            ?>
                            
                            <input hidden type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']; ?>" required>
                            <input hidden type="text" class="form-control" name="id_booking" value="<?php echo $id_booking; ?>" required>
                            <input hidden type="text" class="form-control" name="barbershop" value="<?php echo $id_barbershop; ?>" required>
                            <input hidden type="text" class="form-control" name="status" value="1" required>
                          <div class="form-group col-sm-6">
                            <label for="nama"><span style="color:red">*</span>Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['name']; ?>" readonly>
                          
                          </div>
                          

                          <?php
                          include("connect.php");
                          $query_detail_paket="SELECT id, nama, harga_paket FROM paket 
                                               where id_barbershop = '".$id_barbershop."' "; 
                          $hasil4=pg_query($query_detail_paket);
                          ?>
                          <div class="form-group target col-sm-6">
                            <label for="nama"><span style="color:red">*</span>Pilih Paket</label>
                            <select class="form-control coba" id="paket" name="paket">
                              <option>Pilih</option>
                            <?php
                            while($row = pg_fetch_assoc($hasil4)){
                              ?>
                              <option value="<?php echo $row['id'].'-'.$id_barbershop ?>"><?php echo $row['nama'] ?></option>
                              <?php
                            }
                            ?>
                            </select>                            
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="nama"><span style="color:red">*</span>Harga</label>
                            <input type="text" class="form-control " id="harga_paket" name="harga_paket" value=<?php ?> required readonly>
                          </div>


                          <?php
                          include("connect.php");
                          $query_detail_paket="SELECT barber_id, barber_nama FROM barber 
                                               where barber_shop = '".$id_barbershop."' "; 
                          $hasil4=pg_query($query_detail_paket);
                          ?>
                          <div class="form-group target col-sm-6">
                            <label for="nama"><span style="color:red">*</span>Pilih Barber</label>
                            <select class="form-control coba" id="barber" name="barber">
                              <option>Pilih</option>
                            <?php
                            while($row = pg_fetch_assoc($hasil4)){
                              ?>
                              <option value="<?php echo $row['barber_id']?>"><?php echo $row['barber_nama'] ?></option>
                              <?php
                            }
                            ?>
                            </select>                            
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="nama"><span style="color:red">*</span>Tanggal Booking</label>
                            <input type="date" id='tanggal' class="form-control date" name="tgl_booking" value="" required>
                          </div>
                           <div class="form-group target col-sm-6">
                            <label for="nama"><span style="color:red">*</span>Pilih Jam</label>
                            <select class="form-control coba" id="jam" name="jam" required>
                              <!-- <option></option>
                              <option>11:00</option>
                              <option>12:00</option>
                              <option>13:00</option>
                              <option>14:00</option>
                              <option>15:00</option>
                              <option>16:00</option>
                              <option>17:00</option>
                              <option>18:00</option>
                              <option>19:00</option>
                              <option>20:00</option> -->
                            </select>                            
                          </div>
                          <div class="form-group col-sm-12" >
                            <table class="table table-hover table-bordered table-striped" id="custom"><tbody>
                            </tbody></table>
                          </div>
                          <button type="submit" id='button_ok' class="btn btn-primary pull-right" >Pesan <i class="fa fa-envelope"></i></button>   
                        </form> 
                      </div>                   
                     </div>
                    </div>


                  </section>
              </div>
        
                   


        </div>

    </section>
         
      </section>
     


    <!-- js placed at the end of the document so the pages load faster -->
    
    <script src="scriptss.js" type="text/javascript"></script>
    <script>
    
    </script>

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

  <script type="text/javascript">
    var server = "https://barbershoppdgapp.herokuapp.com/barbershoppdg/";
    var tgl = document.getElementById('tanggal');
    var jam = document.getElementById('jam');
    var barber = document.getElementById('barber');
    var id_bbs = '<?php echo $id_barbershop; ?>'
    tgl.onchange = function(){
      cek_barber();

    }

    barber.onchange = function(){
      cek_barber();

    }

    function cek_barber(){
      var selectedTgl = new Date(tgl.value);

      if(selectedTgl < new Date()) {
        alert("Maaf tanggal tidak tersedia");
        tgl.value = null;
      }
      // console.log(id_bbs + '---' + tgl.value);
      $.ajax({
        url: server+'cekbarber.php?id_barber='+barber.value+'&tanggal='+tgl.value,
        data: "",
        dataType: 'json',
        success: function(rows){
          var result = rows.result;
          var jadwal = rows.jadwal;
          console.log(result);
           var button_ok = document.getElementById('button_ok') 
             if(result == 0){
               //alert("Tanggal tersedia");
               button_ok.disabled = false;
               jam.innerHTML = "<option></option>";
               var jam_tersedia = ['11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00','17:00:00','18:00:00','19:00:00','20:00:00'];
               for (var i = 0; i < jam_tersedia.length; i++) {
                  if(jadwal.includes(jam_tersedia[i]) == false){
                    var opt = document.createElement('option');
                    opt.value = jam_tersedia[i];
                    opt.innerHTML = jam_tersedia[i];
                    jam.appendChild(opt);
                  }
                }
                button_ok.disabled = true;
             } else if(result == 2){
                alert('Pilih Tanggal');
                button_ok.disabled = true;
                tgl.value = null;
             } else {
                alert('Maaf, Jadwal Barber Sudah Penuh');
                button_ok.disabled = true;
                tgl.value = null;
             }
        },
        error: function(){
          console.log(server+'cektanggal.php?id_bbs='+id_bbs+'&tanggal='+tgl.value);
        }
      });
    }

    function cek_tersedia(){
      var selectedTgl = new Date(tgl.value);

      if(selectedTgl < new Date()) {
        alert("Maaf tanggal tidak tersedia");
        tgl.value = null;
        return;
      }
      // console.log(id_bbs + '---' + tgl.value);
      $.ajax({
        url: server+'cektanggal.php?id_bbs='+id_bbs+'&tanggal='+tgl.value+'&jam='+jam.value+'&tanggal='+tgl.value,
        data: "",
        dataType: 'json',
        success: function(rows){
          var result = rows.result;
          console.log(result);
          var button_ok = document.getElementById('button_ok') 
            if(result == 0){
              //alert("Tanggal tersedia");
              button_ok.disabled = false;
            } else {
                alert('Maaf, silahkan pilih tanggal lain, karena ditemukan booking.');
                button_ok.disabled = true;
                tgl.value = null;
            }
        },
        error: function(){
          console.log(server+'cektanggal.php?id_bbs='+id_bbs+'&tanggal='+tgl);
        }
      });
    }



    jam.onchange = function(){
      var selectedjam = new Date(jam.value);
      var jam1 = '13:00';

      cek_tersedia();

    }
  </script>

   <script type="text/javascript">
   $(document).ready(function(){
    $(function(){
      $("select#paket").change(function(){
        if($(this).val() == 12){
          var id_barbershop = '<?php echo $id_barbershop; ?>'
          console.log("brgbooking.php?id"+id_barbershop);
          $.getJSON("brgbooking.php",{id: id_barbershop, ajax: 'true'}, function(data){
            var options = ''; 
            for (var i = 0; i < data.length; i++) {
              options += '<tr><td>Rp. '+data[i].harga+'<input type="number" class="form-control" name="harga[]" value="'+data[i].harga+'" hidden></td></div></tr>';
              // console.log(data[i].nama,data[i].jumlah, data[i].harga);              
            }
            $("#custom").html(options);
            $("#harga_paket").val("");
          })
        }else{
          $("#custom").html("");
          $("#harga_paket").val("");
        }

        $.getJSON("pktbooking.php",{id: $(this).val(), ajax: 'true'}, function(j){
          $("#harga_paket").val(j.harga);
        })
      })
    })
  });

 
  </script>

  </body>
</html>