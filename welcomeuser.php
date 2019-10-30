
<?php 
ob_start();
session_name('franchise');
session_start();
session_regenerate_id(true);
//echo $_SESSION['user'];
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
include_once('page_includes/main-header.inc.php');  

?>


<body class="horizontal-nav skin-megna fixed-layout">

    <?php include_once('page_includes/main-nav.inc.php'); ?>

        <div class="page-wrapper">
         
            <div class="container-fluid">

                    <div class="row el-element-overlay">
                  	<?php
								require_once DB;
								$db_obj = new DataBO;
								$db_conn = $db_obj->get_conn();

								$q = "SELECT title,image FROM movie";
								$r= $db_conn->query($q);

								//if the query ran successfully
								if($r){
		
									while ($row=$r->fetch()) {
						
										$title = $row['title'];
										$img_name = $row['image'];
										$img_path = "uploads/". $row['image'];
									

                 echo  '<div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                            

								
							

                                <div class="el-card-avatar el-overlay-1"> <img src= "'.$img_path.'" alt= "'.$img_name.'" class="img-responsive" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                           <li><a class="btn default btn-outline image-popup-vertical-fit" href= "'.$img_path.'"><i class="icon-magnifier"></i></a></li>
                                            <li><a class="btn default btn-outline" href=""><i class="icon-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title"> '.$title.'</h3> <small><a href="#">View Details</a></small>
                                    <br/> </div>
                             
                            </div>
                        </div>
                    </div>' ;
                }// end if statement
            }//end of while loop
            ?>
                   </div>
               </div>
              </div>

          <?php include_once('page_includes/main-footer.inc.php'); ?>