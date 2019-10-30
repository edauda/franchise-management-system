<?php
ob_start();
session_name('franchise');
session_start();
session_regenerate_id(true);
//echo $_SESSION['user'];
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
include_once('page_includes/main-header.inc.php');  

if(isset($_GET['id']) && $_GET['id'] !=='' ){
	$movie_id = $_GET['id'];
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
						$description =$row[4];
						$image = $row[5];
						$main_character=$row[6];
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