<?php 

//echo $_SESSION['user'];
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
include_once('page_includes/main-header.inc.php');
include_once('addtowatchlistprocess.php'); 
    $page="addtowatchlist";
?>

	
<body class="horizontal-nav skin-megna fixed-layout">

    <?php include_once('page_includes/main-nav.inc.php'); ?>

        <div class="page-wrapper">
        
            <div class="container-fluid">
            	<div class="row el-element-overlay">
            		<?php

            	echo'<div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src= "'.$img_path.'" alt= "'.$img_name.'" class="img-responsive" />
                            </div>
                           </div>
                          </div>
                         </div>';?>

                         <div class="col-lg-5 col-md-7">
                         	
                            	<p><h5>Title:<i><?php echo" ". $title; ?></i></h5></p>
                            	<p><h5>Genre:<i><?php echo " ". rtrim($genre,','); ?> </i></h5></p>
                            	<p><h5>Rating:<i><?php echo " ". $rating; ?></i></h5></p>
                            	<p><h5>Stars:<i><?php echo " ". $main_character; ?></i></h5></p>
                            	<p><h5>Synopsis:<i><?php echo " ". $description; ?></i></h5></p>
                            	<form action="addtowatchlist.php" method="post">
                            	<button type="submit" class="btn btn-success icon-plus" name="submit" id="btnSubmit"> Add to Watchlist </button>
                            	<button type="reset" class="btn btn-danger" name="reset"> Cancel </button>
                           		</form>
                         </div>
                         
            	</div>
            </div>
          </div>
        </body>


<?php include_once('page_includes/main-footer.inc.php'); ?>
