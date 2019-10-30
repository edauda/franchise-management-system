
<?php 
ob_start();
session_name('franchise');
session_start();
session_regenerate_id(true);
//echo $_SESSION['user'];
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
include_once('page_includes/main-header.inc.php');  
    $page="index";
?>

<?php
    $sql_retrieve = "SELECT* FROM movie";
    require_once DB;
    $db_obj = new DataBO;
    $db_conn = $db_obj->get_conn();

    $stmt_retrieve = $db_conn->query($sql_retrieve);

    if($stmt_retrieve && $stmt_retrieve->rowCount()>=1){
        while($row_stmt = $stmt_retrieve->fetch()){ //fetch all the movie details from the database
            $movie_id = $row_stmt[0];
            $movie_title= $row_stmt[1];
            $movie_genre = $row_stmt[2];
            $movie_rating = $row_stmt[3];
            $movie_price = $row_stmt[4];
            $movie_description = $row_stmt[5];
            $movie_character = $row_stmt[7];

            

        }//end while statement
    }//end if $stmt_retrieve
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

                                $q = "SELECT movie_id,title,image FROM movie";
                                $r= $db_conn->query($q);

                                //if the query ran successfully
                                if($r){
        
                                    while ($row=$r->fetch()) {
                                        $img_id = $row['movie_id'];
                                        $title = $row['title'];
                                        $img_name = $row['image'];
                                        $img_path = "uploads/". $row['image'];
                                        
                                    

                 echo  '<div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                            

                                
                            

                                <div class="el-card-avatar el-overlay-1"> <img src= "'.$img_path.'" alt= "'.$img_name.'" class="img-responsive" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                           <li><a class="btn default btn-outline image-popup-vertical-fit" href= "'.$img_path.'" ><i class="icon-magnifier"></i></a></li>
                                           <li><a class="btn default btn-outline" href= "addtowatchlist.php?movie_id='.$img_id.'">Add to Watchlist <i class="icon-plus"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                '; ?>

                                <form method="" action="" class="form-horizontal m-t-40">

                                <div class="el-card-content">
                            <h3 class="box-title"> <?php echo $title ?> </h3> <small><a href="viewdetails.php?movie_id=<?php echo $img_id?> ">View Details</a></small>
                                    <br/> </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <?php
                }// end if statement
            }//end of while loop
            ?>
                   </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <?php include_once('page_includes/main-footer.inc.php'); ?>
        