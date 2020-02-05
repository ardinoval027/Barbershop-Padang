 
 <?php
require 'act/viewdatabbs.php';
  ?>
<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href=""><img src="../assets/img/dsa.png" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><p><?php echo $_SESSION['name']; ?></p></h5>
                    
				<!-- <li class="mt">
                      <a href="../")">
                          <i class="fa fa-book"></i>
                          <span>User Access</span>
                      </a>
                  </li>  -->
                  <li class="sub-menu">
                      <a href="?page=content">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <!-- <a href="?page=updatebarbershop&id=<?php echo $id ?>"> -->
                          <a href="?page=detailbarbershop&id=<?php echo $id ?>">
                          <i class="fa fa-desktop"></i>
                          <span>Information</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="?page=listpaketbarbershop&id=<?php echo $id ?>">
                          <i class="fa fa-gift"></i>
                          <span>Edit Paket</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="?page=listbarber&id=<?php echo $id ?>">
                          <i class="fa fa-cut"></i>
                          <span>Edit Barber</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="resultt()">
                      <i class="fa fa-book"></i>
                      <span>Booking</span>
                      </a>
                          <ul class="sub">
                              <li class="sub-menu">
                                  <a href="?page=daftarpesanan&id=<?php echo $id ?>">
                                      <i class="fa fa-book"></i>
                                      <span>Daftar Booking</span>
                                  </a>
                              </li>
                              <li class="sub-menu">
                                  <a href="?page=pesanankonfirm&id=<?php echo $id ?>">
                                      <i class="fa fa-book"></i>
                                      <span>Booking Dikonfirmasi</span>
                                  </a>
                              </li>
                              <li class="sub-menu">
                                  <a href="?page=pesananbatal&id=<?php echo $id ?>">
                                      <i class="fa fa-book"></i>
                                      <span>Booking Batal</span>
                                  </a>
                              </li>
                          </ul>
                  </li>
                  
				           <li class="sub-menu">
                      <a href="?page=ubahpw">
                          <i class="fa fa-cogs"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
             </ul>