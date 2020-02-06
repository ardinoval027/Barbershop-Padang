<?php

require 'act/countadmin.php';
require 'act/countbarbershop.php';
require 'act/countAB.php';
require 'act/countbooking.php';
?>
<div class="row">
    <div class="col-lg-6 col-xs-12">
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><?php echo $data['barbershop'] ?></h3>
          <p><span>Barbershop</span></p>
        </div>
        <div class="icon">
          <i class="fa fa-scissors"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-xs-12">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $data4['booking'] ?></h3>
          <p><span>Booking</span></p>
        </div>
        <div class="icon">
          <i class="fa fa-calendar"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-xs-12">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $data1['admin'] ?></h3>
          <p><span>Admin</span></p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-xs-12">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $data2['adminbarbershop'] ?></h3>
          <p><span>Admin Barbershop</span></p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
    </div>
	
  </div>