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
         <?php
         	if(isset($_GET['movie_id']) && $_GET['movie_id'] !=='' ){
				$movie_id = $_GET['movie_id'];
	//echo $movie_id;
	//create a new database object
				require_once DB;
				$db_obj = new DataBO;
				$db_conn = $db_obj->get_conn();

	//query the database to see if the id supplied is valid
				$r1 = "SELECT movie_id FROM movie WHERE movie_id='$movie_id'";
				$q1 = $db_conn->query($r1);

					if($q1){
					//if query ran successfully
							if($q1->rowCount()==1){
							//echo "The id is valid ". $movie_id ;
								$q ="SELECT * FROM movie WHERE movie_id='$movie_id'";
								$r = $db_conn->query($q);

									if($r){
										//if query ran successfully
											while($row=$r->fetch()){
												$title= $row[1];
												$genre=$row[2];
												$rating=$row[3];
												$description =$row[6];
												$img_name = $row[7];
												$main_character=$row[8];
												$img_path = "uploads/".$img_name;
												$trailer = $row[5];
												}//end of while statement
											}// end if $r

										

	/*echo $title . "</br>";
	echo $genre . "</br>";
	echo $rating . "</br>";
	echo $description . "</br>";
	echo $image . "</br>";
	echo $main_character . "</br>"; */
										}// end if rowCount
							else
							{
				
								MSUtility::redirect('index.php');
							} // end else if rowCount
						}// end if query ran successfully



					} // end if(isset)
				else
				{
					echo "Please Ensure that you Select a Movie";

				} //end else if isset
         ?>

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
                            	<p><h5><a href="<?php echo $trailer;  ?>" class=" col-lg-3 label label-danger" target="_blank">Preview Trailer</a></h5></p>


                         </div>
                         
            	</div>
            </div>
          </div>
        </body>


<?php include_once('page_includes/main-footer.inc.php'); ?>
