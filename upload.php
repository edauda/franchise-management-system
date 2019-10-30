<?php
	if(isset($_FILES['fileToUpload'])){
		$errors = array();
		$file_name = $_FILES['fileToUpload']['name'];
		$file_size = $_FILES['fileToUpload']['size'];
		$tmp_name = $_FILES['fileToUpload']['tmp_name'];
		$file_type = $_FILES['fileToUpload']['type'] ;
		$file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));

		$allowed_formats  = array('jpg','png','jpeg');

		//check if the file extension is allowed
		if(in_array($file_ext, $allowed_formats)===false){
			$errors[] ="The extension of the selected file is not allowed. Please Select another Image with either of the extension JPG, JPEG, PNG";
			} //end check for allowed file extension

			//check for file size 500kb
			if($file_size > 500000){
				$errors[] = "Sorry, the file is too large. Max Size = 500kb";
			} // end check for file size

			//check if the file already exist
			if(file_exists("uploads/".$file_name)){
				$errors[] = "Sorry, the file already exist";
			}

			//if everything is ok
			if(empty($errors)){
				move_uploaded_file($tmp_name, "uploads/".$file_name);
				echo "The file has been successfully uploaded";
			}
			else{
				print_r($errors);
			}
	}
?>

<html>
   <body>
      
      <form action = "upload.php" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "fileToUpload" />
         <input type = "submit" value="Submit" />
			
         <ul>
            <li>Sent file: <?php echo $_FILES['fileToUpload']['name'];  ?>
            <li>File size: <?php echo $_FILES['fileToUpload']['size'];  ?>
            <li>File type: <?php echo $_FILES['fileToUpload']['type']; ?>
         </ul>
			
      </form>
      
   </body>
</html>