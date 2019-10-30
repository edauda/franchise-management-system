<?php   
        //start output buffering to prevent header already sent error
    ob_start();
    session_name('franchise');
    session_start();
    session_regenerate_id(true);

include_once('page_includes/main-header2.php');
$page="addbranch";
?>

<body class="skin-default fixed-layout">
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
         <?php include_once('page_includes/topnav.php'); ?>
      <?php include_once('page_includes/sidenav.php'); ?>

        <div class="page-wrapper" style="margin-bottom: 140px;">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Create New Branch</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">addbranch</li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
         <?php include_once('addbranchprocess.php'); ?>
                <div class="row">
                    <div class="col-12">
                                    
                        <div class="card card-body">
                                                      
                           
                                <div class="col-sm-12 col-xs-12">
                                    <form name="addbranch" method="post" action="addbranch.php" id="addbranch">
                                        <div class="form-group">
                                            <label for="branchName">Branch Name</label>
                                            <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Branch Location</label>
                                            <input type="text" class="form-control" id="branch_address" name="branch_address" placeholder="Enter Location" >
                                        </div>
                                       
                                       <!-- <div class="form-group">
                                            <label for="exampleInputPassword1">Manager Name</label>
                                            <input type="text" class="form-control" id="branch_manager" name="branch_manager" placeholder="Enter Manager Name">
                                        </div>-->
                                    
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit" id="submit">Submit</button>
                                        <button type="submit" name="cancel-submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                           
                        </div>
          
            </div>
        </div>
        </div>
    </div>
      <?php include_once('page_includes/footer.php');?>