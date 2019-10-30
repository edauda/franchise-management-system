<?php
     //start output buffering to prevent header already sent error
    ob_start();
    session_name('franchise');
    session_start();
    session_regenerate_id(true);
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
include_once('page_includes/main-header.inc.php'); 
$page="contact";
?>
        <div class="main-wrapper">
              <?php include_once('page_includes/topnav.php'); ?>
    
        <div class="page-wrapper">
            
            <div class="container-fluid">
              
               
         
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-xlg-10 col-lg-9 col-md-8 bg-light border-left">
                                    <div class="card-body">
                                    <form action="#" method="post" id="contact">
                                        <h3 class="card-title">Want to talk to us? Feel free and send us a message.</h3>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Email:">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Subject:">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..."></textarea>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> Send</button>
                                        <button class="btn btn-dark m-t-20"><i class="fa fa-times"></i> Discard</button>
                                    </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
   <?php include_once('page_includes/main-footer.inc.php'); ?>