<?php
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');


//check if all fields have been supplied
if (isset($_POST['submit'])){
	$branch_name= MSUtility::filterPostString('branch_name');
	$branch_address = MSUtility::filterPostString('branch_address');
	//$branch_manager = MSUtility::filterPostString('branch_manager');

	$errors = array();
	
	if($branch_name && $branch_address){
		//if everything is ok
		try{
			//require database connection
			require_once DB;
			$db_obj = new DataBO;
			$db_conn = $db_obj->get_conn();




			//query the database to check if the branch name exist first
			$sql ="SELECT *  FROM branch WHERE branch_name='$branch_name'";
			$stmt = $db_conn->query($sql);

			//	var_dump($stmt);
			//	die();
			//if the query ran successfully
			if($stmt)
			{
				if($stmt->rowCount() ==1){

					$errors[] = "Sorry, the branch already exist";

				}//end if
			} // end if query

			if(empty($errors)){
				//if there are no errors
			//	$db_conn->beginTransaction();

				$sql2 = "INSERT INTO branch(branch_name,location) VALUES('$branch_name','$branch_address')";
				$stmt2= $db_conn->query($sql2);
						
					if($stmt2){
						//if Query ran successfully
						//var_dump($stmt2);
					//die();
						echo "<div class='col-md-6 alert alert-info'> The Branch " .$branch_name. " has been Created! </div>";
					}//end if query ran successfully
					else
					{
						print_r($errors);
					}
			}//end if no errors
		} //end Try
		catch(PDOException $ex){
			$url = "addbranch.php?error=A System error occured while creating the branch";
			MSUtility::redirect($url);
	} //Try Catch
}//end if check all fields have been supplied
}
?>