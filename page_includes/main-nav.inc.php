    <?php 
    //ob_start();
    //session_name('franchise');
    //session_start();  
   // session_regenerate_id(true);
    ?>
    <div id="main-wrapper">

        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
  
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                   
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span class="hidden-sm-down">
                         <!-- dark Logo text -->
                         <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                 
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a> </li>
                         <li class="nav-item"><a href="about.php" class="nav-link">About</a> </li>
                         <?php
                            if(isset($_SESSION['user'])){
                                echo ' <li class="nav-item"><a href="regfranchise.php" class="nav-link">Register Franchise</a> </li> ';
                            }
                         ?>
                          <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a> </li>

                            

                            <?php if(isset($_SESSION['user'])){
                                        echo ' <li class="nav-item"><a href="#" class="nav-link">Watchlist</a> </li>' ;
                                    }
                                    ?> 
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item" style="margin-left:50px;">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                     
                        <li class="nav-item">
                            <a class="nav-link " href="login.php">Login</a>
                         </li>
                         <li class="nav-item navbar-brand nav-link" style="margin-top: 15px; margin-left: -15px;">//</li>
                          <li class="nav-item"> 
                            <a class="nav-link" href="register.php" style="margin-left: -30px;">Register </a>
                           </li>
           
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down">User &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                             
                              <?php
                                if(isset($_SESSION['user'])){
                                    echo '
                                      <a href="" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                                           
                                <a href="" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                 <a href="" class="dropdown-item"><i class="ti-video-camera"></i> Watchlist</a>
                                 ';
                                }
                              ?>
                                <div class="dropdown-divider"></div>
                                
                             
                                    <?php if(isset($_SESSION['user'])){
                                        echo ' <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i>  Logout</a> ' ;
                                    } else{
                                        echo '  <a href="login.php" class="dropdown-item"><i class="fa fa-power-off"></i> Login</a> ';
                                    }
                                    ?> 
                               
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                       
                    </ul>
                </div>
            </nav>
        </header>