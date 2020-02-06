<?php 
session_start();
if(isset($_SESSION['A'])){
	echo"<script language='JavaScript'>document.location='index.php'</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Barbershop Kota Padang</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  
	  	
	  	
		      <form class="form-login" action="session.php" method="post">
		        <h2 class="form-login-heading" style ="background-color: #1685e5">sign in now</h2>
		        <div class="login-wrap">       
		            <input type="text" class="form-control" placeholder="Username" name="username" autofocus>&nbsp
		            <input type="password" class="form-control" name="password" placeholder="Password">&nbsp
		            <button class="btn btn-theme btn-block" type="submit" name="submit" style ="background-color: #1685e5"><i class="fa fa-lock" ></i> SIGN IN</button>&nbsp
                <center><a href="register.php">Buat Akun?</a></center>
                <hr>
                <center> <b> WebGIS BARBERSHOP PADANG </b> </center>
                <center> NEW RULES : </center>
                <center>⛔ UNTUK MENGHINDARI FULL BOOKING, KITA OPEN BOOKING H-1 ⛔ </center>
                <center> <b> Available for booking and walk-in Book and See on maps </b> 👉 <a href = "https://barbershoppdgapp.herokuapp.com">https://barbershoppdgapp.herokuapp.com</a> </center>
		
		        </div>
			
		      </form>	  	
	  	

	 

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("foto/barber1.jpg", {speed: 500});
    </script>


  </body>

<!-- Mirrored from demo.gridgum.com/templates/AdminDashboard/DashGum/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Apr 2017 13:34:16 GMT -->
</html>
