<?php
ob_start();
session_name('franchise');
session_start();
session_regenerate_id(true);
	include_once('classes/MSUtility.php');
	include_once('includes/config.inc.php');
	
?>

<?php
         	if(isset($_GET['movie_id']) && $_GET['movie_id'] !=='' ){
				$movie_id = $_GET['movie_id'];
				$_SESSION['movie_id'] = $movie_id;
				// $user = $_SESSION['user'];
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
												$description =$row[5];
												$img_name = $row[6];
												$main_character=$row[7];
												$img_path = "uploads/".$img_name;
												}//end of while statement
											}// end if $r

										//print_r($_SESSION['movie_id']);
									//	die();

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

 


<?php
	if(isset($_POST['submit'])){
		$movie_id = $_SESSION['movie_id'];
		require_once DB;
		$db_obj = new DataBO;
		$db_conn = $db_obj->get_conn();
		//$user = $_SESSION['user'];
		//print_r($movie_id);
		print_r($user);
		die();
		MSUtility::redirect('addtowatchlist.php?movie_id=$movie_id');
		//
		//echo $movie_id;
	//	var_dump($movie_id);
	}
?>

