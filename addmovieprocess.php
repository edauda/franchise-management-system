<?php
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');

if (isset($_POST['submit']) && isset($_FILES['fileToUpload'])){
	$selected_genre = "";
	$title = MSUtility::filterPostString('movietitle');
	$rating = MSUtility::filterPostString('rating');
	$actors = MSUtility::filterPostString('actors');
	$price = MSUtility::filterPostInt('price');
	$description = MSUtility::filterPostString('description');
	$trailer = MSUtility::filterPostString('trailer');

	$errors = array();

	//check for the selected checkboxes
	if(!empty($_POST['genre'])){
		//loop through the array of options
		foreach ($_POST['genre'] as $selected) {
			$selected_genre .= $selected .",";
			//$selected_genre = PHP_EOL . $selected;
			//echo $selected_genre;
		}// end foreach loop
	}
	else{
		$errors[]="Please ensure you select at least One Genre";
	}// end if not empty

	//handle file upload
	
		$file_name = $_FILES['fileToUpload']['name'];
		$file_size = $_FILES['fileToUpload']['size'];
		$tmp_name = $_FILES['fileToUpload']['tmp_name'];
		$file_type = $_FILES['fileToUpload']['type'] ;
		$file_ext = explode('.', $_FILES['fileToUpload']['name']);
		$ext = strtolower(end($file_ext));
			
		$allowed_formats  = array('jpg','png','jpeg');

		//check for valid file extension
		if(in_array($ext, $allowed_formats)===false){
			$errors[] = "The Selected file is not allowed. Select a file with JPG, PNG, JPEG extension";
		}// end if check

		//check for file size
		if($file_size> 500000){
			//maximum file size is 500kb
			$errors[] = "Sorry, the file is too large";
		}// end if check for file size

		//check if the file already exist
			if(file_exists("uploads/".$file_name)){
				$errors[] = "Sorry, the file already exist";
			}

		if(empty($errors)){
			try {
			 	//if everything is ok upload the file and store it in a database
				move_uploaded_file($tmp_name, "uploads/".$file_name);

			//require the database connection
			require_once DB;
			$db_obj = new DataBO;
			$db_conn = $db_obj->get_conn();

			//connect to the database
			if($db_conn){
				$sql = "INSERT INTO movie(title,genre,rating,price,trailer_link,description,image,main_character) VALUES('$title','$selected_genre','$rating','$price','$trailer','$description','$file_name','$actors')";

				$stmt = $db_conn->query($sql);
				echo "<label class='label label-info col-md-5'> The Movie ". $title. " has been successfully added</label>";
			}//end if db_conn
			//move_uploaded_file($tmp_name, "uploads/".$file_name);
		
		else
		{
			//echo "<div class='alert alert-danger'>$errors  </div>";
			print_r($errors);
		}// end if $errors is empty 
			 }
			  catch (Exception $ex) {
			 	$url = "addmovie.php?error=A System error occoured while trying to add movie";
			 	MSUtility::redirect($url);
			 } //end Try catch 
		//echo $selected_genre;
 }
} //end if check for valid files
?>