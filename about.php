<?php 
ob_start();
session_name('franchise');
session_start();
session_regenerate_id(true);
//echo $_SESSION['user'];
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
include_once('page_includes/main-header.inc.php');  
    $page="viewdetails";
?>

	
<body class="horizontal-nav skin-megna fixed-layout">

    <?php include_once('page_includes/main-nav.inc.php'); ?>

        <div class="page-wrapper">
        	<div class="container-fluid">
            	<div class="row el-element-overlay">
            		<div class="row">
            			<div class="col-lg-12">
            				 <h3 class="card-title">Cinema Franchise Management System.</h3>
            		 <h4>Designed by Udele Daniel HND 2</h4>
            		 <h5> Deparment of Computer Science</h5>
            		 <h6>The Federal Polytechnic Bauchi</h6>
            			</div>
            		</div>
            	</div>
            	 </div>
            </div>
  <?php include_once('page_includes/main-footer.inc.php'); ?>