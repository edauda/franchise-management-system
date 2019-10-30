
<?php 
//echo $_SESSION['user'];
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
include_once('page_includes/main-header.inc.php');  
include_once('regfranchiseprocess.php');
    $page="regfranchise";
?>

<body class="horizontal-nav skin-megna fixed-layout">

    <?php include_once('page_includes/main-nav.inc.php'); ?>
    	<div class="page-wrapper">
         
            <div class="container-fluid">

            	<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-xlg-12 col-lg-11 col-md-8 bg-light border-left">
                                    <div class="card-body">
                                    <form action="regfranchise.php" method="post" id="regfranchise">
                                        <h3 class="card-title">Franchise Registration Form.</h3>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Franchise Name:" name="franchise_name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Business Location:" name="franchise_location">
                                        </div>
                                          <div class="form-group">
                                            <input class="form-control" placeholder="Owner's Name:" name="owner_name">
                                        </div>
                                          <div class="form-group">
                                            <input class="form-control" placeholder="Owner's Phone Number:" name="owner_number">
                                        </div>
                                          <div class="form-group">
                                            <input class="form-control" placeholder="Owner's Address:" name="owner_address">
                                        </div>
                                        <input type="hidden" name="submitted" value="True"/>
                                        <button type="submit" class="btn btn-success m-t-20" name="submit"><i class="fa fa-envelope-o"></i> Submit</button>
                                        <button class="btn btn-dark m-t-20"><i class="fa fa-times" name="cancel" type="reset" ></i> Cancel</button>
                                    </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          </div>

    <?php include_once('page_includes/main-footer.inc.php'); ?>