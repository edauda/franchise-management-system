<?php 
ob_start();
//session_name('franchise');
session_start();
include_once('page_includes/main-header2.php');
    $page="adminhome";
     ?>

<body class="skin-default fixed-layout">
   
    <div id="main-wrapper">
        <?php include_once('page_includes/topnav.php'); ?>
       <?php include_once('page_includes/sidenav.php'); ?>
        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Welcome Admin</h4>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                         <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="card-title m-b-40">LATEST </h5>
                                        <p>Lorem ipsum dolor sit amet, ectetur adipiscing elit. viverra tellus. ipsumdolorsitda amet, ectetur adipiscing elit.</p>
                                        <p>Ectetur adipiscing elit. viverra tellus.ipsum dolor sit amet, dag adg ecteturadipiscingda elitdglj. vadghiverra tellus.</p>
                                    </div>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <div id="morris-area-chart" style="height:250px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             
                </div>

               
            </div>
   
        </div>
 
<?php include_once('page_includes/footer.php'); ?>
