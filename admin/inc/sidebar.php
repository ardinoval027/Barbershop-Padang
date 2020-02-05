<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href=""><img src="../assets/img/admin-png-7.png" class="img-circle" width="100"></a></p>
                  <h5 class="centered"><p><?php echo $_SESSION['name']; ?></p></h5>
                  
					<li class="mt">
                      <a target="_blank" href="../">
                          <i class="fa fa-book"></i>
                          <span>User Access</span>
                      </a>
                  </li>
				        <li class="sub-menu">
                      <a href="./")">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="resultt()">
                      <i class="fa fa-desktop"></i>
                      <span>Barbershop</span>
                      </a>
                          <ul class="sub">
                              <li class="sub-menu">
                                  <a href="?page=listbarbershop">
                                      <i class="fa fa-desktop"></i>
                                      <span>List Barbershop</span>
                                  </a>
                              </li> 
                              
                          </ul>
                  </li>  
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="resultt()">
                      <i class="fa fa-user"></i>
                      <span>User Management</span>
                      </a>
                          <ul class="sub">
                              <li class="sub-menu">
                                <a href="?page=listadminbbs">
                                <i class="fa fa-user"></i>
                                  <span>Admin & Pengurus</span>
                               </a>
                               </li>
                              <li class="sub-menu">
                              <a href="?page=listuser">
                              <i class="fa fa-user"></i>
                               <span>Users</span>
                             </a>
                            </li>
                          </ul>
                  </li>
                 </ul>