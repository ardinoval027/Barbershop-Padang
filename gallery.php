<!DOCTYPE html>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>WEBGIS</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  
  </head>



  <body>

   <section id="container" >
      <header class="header black-bg">
             
            <a class="logo"><p><b style="font-size: 20px">WeBGiS Barbershop</b></p></a>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
				          <p class="centered"><a href=""><img src="assets/img/bbshp2.png" class="img-circle" width="80"></a></p>
                  <h5 class="centered"><p>Barbershop</p></h5>
                  
				</ul>
          </div>
      </aside>
      <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row mt">
              <div class="col-sm-7" id="result">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose"style ="background-color: #9e1134">Gallery Barbershopp</a>
                        <div class="content" style="text-align:center;">
                        <div class="html5gallery" style="max-height:600px;overflow:auto;" data-skin="horizontal" data-width="500" data-height="300" data-resizemode="fit">  
                        <?php
require 'connect.php';

$id = $_GET["idgallery"];

  $querysearch  ="SELECT a.id, b.gallery_barbershop FROM barbershop as a left join barbershop_gallery as b on a.id=b.id where a.id='$id' ";       
$hasil=pg_query($querysearch);
while($baris = pg_fetch_assoc($hasil))
                  {
                    if(($baris['gallery_barbershop']=='-')||($baris['gallery_barbershop']==''))
                    {
                        echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                    }
                    else
                    {
                            echo "<a href='foto/".$baris['gallery_barbershop']."'><img src='foto/".$baris['gallery_barbershop']."'></a>";
                    }
                  }

                    ?>
                                  
                        </div>
                        </div>
                    </div>
                </section>
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
    <script src="script.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <script src="assets/js/advanced-form-components.js"></script>      
	  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  </body>
</html>
