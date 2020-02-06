<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Barbershop Kota Padang</title>

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
  <style type="text/css">
  .rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating label .icon {
  float: left;
  color: transparent;
}

.rating label:last-child .icon {
  color: #000;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: #09f;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px #09f;
}

      #legend {
        background:white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
    font-color: blue;
        font-family: Arial, sans-serif;
    opacity: 2.5;
    }
    .color {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
    }
    .a {
        background: #660346;
      }
    .b {
        background: #ed0202;
      }
    .c {
        background: #9398ec;
      }
    .d {
        background: #ec87ec;
      }
    .e {
        background: #42cb6f;
      }
    .f {
        background: #5c9ded;
      }
    .g {
        background: #373435;
      }
    .h {
        background: #ec87ec;
      }
    .i {
        background: #758c01;
      }
    .j {
        background: #4b0170;
      }
    .k {
        background: #fce8b7;
      }
    .l {
        background: #f58d6f;
      }
   </style>
  </head>

  <body>

   <section id="container" >
      <header class="header black-bg">
             
            <a class="logo"><p><b style="font-size: 20px">WebGIS Barbershop</b></p></a>
            <ul class="nav pull-right top-menu">
                  <a href="admin/act/logout.php" class="logo" style="font-size:14px"><i class="fa fa-sign-in"></i>
                   <b>Logout</b></a>
              </ul>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
               <ul class="sidebar-menu" id="nav-accordion">
              
                 <p class="centered"><a href=""><img src="assets/img/acnt.PNG" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><p><?php echo $_SESSION['name']; ?></p></h5>
                 
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="resultt()">
                          <i class="fa fa-search"></i>
                          <span>Cari Berdasarkan Nama</span>
                      </a>
                     
                      <ul class="sub">
                        <div  class="panel-body" >
                          
                            <input type="text" class="form-control" id="caribarbershop" name="caribarbershop" placeholder="Search..." >
                            <br>
                            <button type="submit" class="btn btn-default" value="caribarbershop" onclick="carinamabarbershop()"> <i class="fa fa-search"></i></button>                          
                         
                        </div>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()" >
                          <i class="fa fa-cogs"></i>
                          <span>Kecamatan</span>
                      </a>
                      <ul class="sub">
                         <div  class="panel-body" >
                            <select class="form-control" id="kecamatan" >
                                <?php
                                include("connect.php"); 
                                $kecamatan=pg_query("select * from kecamatan ");
                                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                                {
                                echo"<option value=".$rowkecamatan['id'].">".$rowkecamatan['nama']."</option>";
                                }
                                ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="caribbskec"  value="cari" onclick="caribbskec()"><i class="fa fa-search"></i></button>
                          </div>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-star "></i>
                          <span>Cari Berdasarkan Rating</span>
                      </a>
                      <ul class="sub">
                          <div  class="panel-body" >
                          <select class="form-control" id="c_paket" >
                                <option value="1">Tertinggi</option>
                                <option value="2">Terendah</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="caripaket"  value="cari" onclick='caripaket()'><i class="fa fa-search"></i></button>
                      </ul>
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
                  <li>
                      <a data-toggle="modal" data-target="#change_password">
                          <i class="fa fa-cogs"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
                  
             </ul>
             <marquee style = "color : white"><b> WebGIS BARBERSHOP PADANG || ⛔ Available for booking and walk-in Book and See on maps 👉 https://barbershoppdgapp.herokuapp.com</b></marquee>
          </div>
      </aside>

      <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <form class="form-modal-add" action="change_password.php" method="POST">
                  <div class="modal-content">
                      <div class="modal-header" style ="background-color: #1685e5">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4>Change Password</h4>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="old">Old Password</label>
                              <input id="old" type="password" class="form-control" name="old" required>
                          </div>
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
                          <input type="submit" name="submit" class="btn btn-primary btn-ok" style ="background-color: #1685e5" value="Change">
                      </div>
                  </div>
              </form>
          </div>
      </div>

      <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row mt">
              <div class="col-sm-8" id="hide2">
                  <section class="panel">
                      <header class="panel-heading">
                          <label style="color: black"><b>Google Map with Location List</b></label>
                          <a class="btn btn-default" style="background-color: #9e1134" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi Sekarang"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                          <a class="btn btn-default" style="background-color: #9e1134" role="button" data-toggle="collapse" onclick="manualLocation()" title="Posisi Manual"><i class="fa fa-location-arrow" style="color:black;"></i></a>
                    <a class="btn btn-default" style="background-color: #9e1134" role="button" data-toggle="collapse" href="#terdekat" title="Disekitar" aria-controls="terdekat"><i class="fa fa-road" style="color:black;"></i></a>
                    <a class="btn btn-default" style="background-color: #9e1134" role="button" data-toggle="collapse" onclick="tampilsemua();resultt()" title="Tampil Semua" aria-controls="terdekat"><i class="fa fa-map-pin" style="color:black;"></i></a>
          <label id="tombol">
          <a class="btn btn-default" role="button" style="background-color: #9e1134" id="showlegenda" data-toggle="collapse" onclick="legenda()" title="Legenda"   ><i class="fa fa-eye" style="color:black;"></i></a></label>
                    <label></label>         
                    <div class="collapse" id="terdekat">
                    <div class="well">
                    <label><b>Radius&nbsp</b></label><label style="color:black" id="km"><b>0</b></label>&nbsp<label><b>m</b></label><br>
                    <input  type="range" onclick="cek();aktifkanRadius();resultt()" id="inputradiusbbs" name="inputradiusbbs" data-highlight="true" min="1" max="20" value="1" >
                    </div>
          </div>
          

               </h3>
                      </header>
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:400px; z-index:60"></div>
                      </div>
                  </section>
              </div>
              <div class="col-sm-4" id="result">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose"style ="background-color: #9e1134">Result</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group" id="hasilcari1" style="display:none;">
                        <table class="table table-bordered" id='hasilcari'>
                        </table>  
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
          
                        <!-- <?php
            // include ("connect.php");
            //             $sql = pg_query("SELECT * FROM event order by id asc");
            //             while($data =  pg_fetch_array($sql)){
            //             $id = $data['id'];
            //             $name = $data['name'];
                        ?>
                        <tr>
                        <td><?php // echo "$id"; ?></td> -->
                        <!-- <td><?php // echo "$name"; ?></td> -->
                        
                        <!-- </div>
                        </td>
                        </tr>
                        <?php // } ?> -->
                        <!-- </tbody>
                        </table> -->
                      <!-- </div>                   
                  </div>
                    </div>
                </section>
                 </div> -->

                 <div class="col-sm-8" style="display:none;" id="infoo">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose" style ="background-color: #9e1134">Information</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group">
                        <table class="table" id='info'>
                        <tbody  style='vertical-align:top;'>
                        </tbody> 
                        </table>
                        <form class="rating">
                          <label>
                            <input type="radio" name="stars" value="1" id="star_1" />
                            <span class="icon">★</span>
                          </label>
                          <label>
                            <input type="radio" name="stars" value="2" id="star_2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                          </label>
                          <label>
                            <input type="radio" name="stars" value="3"  id="star_3"/>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>   
                          </label>
                          <label>
                            <input type="radio" name="stars" value="4"  id="star_4"/>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                          </label>
                          <label>
                            <input type="radio" name="stars" value="5"  id="star_5"/>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                          </label>
                        </form>

                        <form action="simpan_rating.php" method="post" style="display:none;" id="form_rating">
                          <input type="hidden" value="<?php echo $_SESSION['username'];?>" name="id_pelanggan" id="id_pelanggan_rating">
                          <input type="hidden" value="" name="id_barbershop" id="id_barbershop_rating">
                          <input type="hidden" value="" name="nilai" id="nilai_rating">
                        </form>

                        <h1 id="point_rating">Rating : </h1>
            
                      </div> 
  
            
                  </div>
                    </div>
                </section>
                 </div>
         
          <div class="col-sm-4" style="display:none;" id="att2">
          <section class="panel">
          <div class="panel-body">
                        <a class="btn btn-compose"style ="background-color: #9e1134">Route</a>
                    </div>
                    <div id="rute" class='box-body'></div>
                </section>
                 </div>
          </div>
    
    <div class="row mt" style="display:none;" id="showlist">  
    <?php 
    include 'connect.php';
    $sql = pg_query("SELECT * FROM barbershop");
     ?>
<?php
  $jml_kolom=3;
  $cnt = 1;
  while($data =  pg_fetch_assoc($sql)){
    if ($cnt >= $jml_kolom) 
    {
          echo "<div class='row mt mb'>";
    }
 
  ?>
  <div class="row-mt">
    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-6 desc">
    <div class="project-wrapper">
      <div class="project">
        <div class="photo-wrapper">
          <div class="photo">
            <a class="fancybox" href="foto/<?php echo $data['image']; ?>"><img class="img-responsive" src="foto/<?php echo $data['image']; ?>" alt=""></a>
          </div>
          <div class="overlay"></div>
          <p style="color: #f3fff4"><?php echo $data['name']; ?><br><?php echo $data['address']; ?></p>
        </div>
      </div>      
    </div>      
  </div>
  </div>      
      
  <?php
  if ($cnt >= $jml_kolom) 
    {
          
          $cnt = 0;
      echo "</div>";
    }
    $cnt++;
  }
  ?>
 

        </div>

    </section>
         
      </section>
      <footer class="site-footer">
          <div class="text-center">
              
              <a href="indexs.php" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
  </section>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="scripts.js" type="text/javascript"></script>
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
    
    <script type="text/javascript">
    $(':radio').change(function() {
      $('#nilai_rating').val(this.value);
      $('#form_rating').submit();
    });

      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  <script type="text/javascript">
$('#inputradius').slider({
  formatter: function(value) {
    return value+' km';
    }
  });
$('[data-toggle="tooltip"]').tooltip();
</script>
  </body>
</html>
