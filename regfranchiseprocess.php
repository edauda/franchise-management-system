<?php	
ob_start();
session_name('franchise');
session_start();
session_regenerate_id(true);
	include_once('classes/MSUtility.php');
	include_once('includes/config.inc.php');
?>

<?php
if(isset($_POST['submitted']) && !empty($_POST['submitted'])){
	$franchise_name= MSUtility::filterPostString('franchise_name');
	$franchise_location = MSUtility::filterPostString('franchise_location');
	$owner_name = MSUtility::filterPostString('owner_name');
	$owner_number = MSUtility::filterPostString('owner_number');
	$owner_address = MSUtility::filterPostString('owner_address');
	
	//$user_name = $_SESSION['user'];
	$user_id = $_SESSION['id'];

	//if all fields are valid
	if($franchise_name && $franchise_location && $owner_name && $owner_number && $owner_address){
		//create an instance of the database object
	require_once DB;
	$db_obj = new DataBO;
	$db_conn = $db_obj->get_conn();

		//check if the database connection was successful
	if($db_conn){

		//check if the franchise name already exist in the database
	$query = "SELECT franchise_name FROM franchises WHERE franchise_name='$franchise_name'";
	$run =  $db_conn->query($query);

	//if query ran successfully
	if($run){


		if($run->rowCount() ==1){
	
			//if the franchise name exist
			echo 'The Franchise Name Already Exist!';
			MSUtility::redirect('regfranchise.php');

		}
	}//end if query ran successfully

			try {
				//$db_conn->beginTransaction();
				//insert data into the database
						
				$insert = "INSERT INTO franchises(user_id,franchise_name,franchise_location,owner_name,owner_number,owner_address) VALUES('$user_id','$franchise_name','$franchise_location','$owner_name','$owner_number','$owner_address')";
				
				$in_result= $db_conn->query($insert);
				
				echo"Record has been successfully added";

		} catch (PDOException $e) {
				$db_conn->rollback();

		}

	}//end if $db_conn
	}// end if all fields are valid

//die();
}
?>