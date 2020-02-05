<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Barbershop</title>

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
        background: #f58d6f;
      }
    .b {
        background: #f58d6f;
      }
      .c {
        background: #fce8b7;
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
        background: #d51e5a;
      }
    .i {
        background: #9398ec;
      }
    .j {
        background: #f9695d;
      }
    .k {
        background: #ec87bf;
      }
    .l {
        background: navy;
      }
   </style>
  </head>

  <body>

   <section id="container" >
      <header class="header black-bg">
             
            <a class="logo"><p><b style="font-size: 17px">Barbershop</b></p></a>
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
                      <a href="profil.php">
                          <i class="fa fa-user"></i>
                          <span>Profil</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="daftarbooking.php">
                          <i class="fa fa-user"></i>
                          <span>Riwayat Booking</span>
                      </a>
                  </li>
             </ul>
          </div>
      </aside>
      <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row mt">
              <div class="col-sm-12" id="hide2">
                  <section class="panel">
                      
                      <div class="panel-body">
                          
                          <p> ABCD </p>	
                      </div>
                  </section>
              </div>
              
          </div>
    
   
 

        </div>

    </section>
         
      </section>
      <footer class="site-footer">
          <div class="text-center">
              
              <a href="index.html#" class="go-top">
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

    
    <script type="text/javascript">
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
