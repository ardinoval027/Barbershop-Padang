<!DOCTYPE html>
<?php
session_start();
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
             
            <a class="logo"><p><b style="font-size: 17px">WebGIS</b></p></a>
           <ul class="nav pull-right top-menu">
                  <a href="login.php" class="logo1"  style="font-size:14px"><i class="fa fa-sign-in"></i>
                   <b>Login</b></a>
              </ul>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
               <ul class="sidebar-menu" id="nav-accordion">
                 <p class="centered"><a href=""><img src="assets/img/ff.png" class="img-circle" width="80"></a></p>
                  <h5 class="centered"><p>Welcome</p></h5>
                  <li class="sub-menu">
                      <a href="index.php">
                          <i class="fa fa-arrow-left"></i>
                          <span>Kembali ke Home</span>
                      </a>
                  </li>
                  
             </ul>
          </div>
      </aside>
      <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row mt">
              <div class="col-sm-12">
                  <section class="panel">
                      <header class="panel-heading">
                      </header>
                      <div class="panel-body">
                          <h4> Maaf Anda Belum Login, Silahkan Login Terlebih Dahulu</h4>
                          <a href="login.php" class="button"  style="font-size:14px"><i class="fa fa-sign-in"></i>
                          <b>Login</b></a>
                      </div>
                  </section>
              </div>
              
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
