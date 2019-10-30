<?php
	include_once('classes/MSUtility.php');
	include_once('includes/config.inc.php');


if(isset($_POST['submitted']) && !empty($_POST['submitted'])){

	$username = MSUtility::filterPostString('username');
	$pass = MSUtility::filterPostString('pass');
	$cpass = MSUtility::filterPostString('cpass');
	$email = MSUtility::validateEmail('email');
	$position = MSUtility::filterPostString('position');
	$manager = MSUtility::filterPostString('manager');
	$fname = MSUtility::filterPostString('fname');
	$lname = MSUtility::filterPostString('lname');
	$phone_no = MSUtility::filterPostString('phone');
	list($lname,$oname) = explode(" ", $lname);

	//if all fields are valid
	if($username && $pass && $cpass && $email && $position && $manager && $fname && $lname && $phone){
		//check if the password and confirm password are the same

		if($cpass !=$pass){
			echo '<div class="alert alert-danger"> Sorry the Passwords do not match! </div> ';
		}//end if passwords do not match

		require_once DB;
		$db_obj = new DataBO;
		$db_conn = $db_obj->get_conn();
		$emailQuery = "SELECT email FROM staff_profile WHERE email='$email'";
		$emailResult = $db_conn->query($emailQuery);

		if($emailResult){
			//if the query ran successfully
			if($emailResult->rowCount()==1){
				echo '<div class="alert alert-danger"> Sorry, the Email already Exist! </div> ';
			}// end check for existing email

		}// end if query ran successfully

		$userQuery = "SELECT username FROM user WHERE username='$username'";
		$userResult = $db_conn->query($userQuery);
		if($userResult){
			if($userResult->rowCount()==1){
				echo '<div class="alert alert-danger"> Sorry this username is not available </div> ';
			}// end if username exist
		}//end if username query ran successfully

		try {
				//$db_conn->beginTransaction();
				$userInsert = "INSERT INTO user(username,password,account_type,status) VALUES('$username','sha1($pass)',2,1)";
				$user_insert_result = $db_conn->query($userInsert);

				if($user_insert_result){
					$user_id = $db_conn->lastinsertid();
					$profile_insert = "INSERT INTO staff_profile(fname,lname,oname,phone_no,email,address,position,location,user_id) VALUES('$fname','$lname','$oname','$phone_no','$email','$address','$position','$location','$user_id')";
					$profile_result = $db_conn->query($profile_insert);

					if($profile_result){
						//if query ran succesfully
						$profile_id = $db_conn->lastinsertid();
						$p_query = "UPDATE user SET profile_id='$profile_id' WHERE user_id='$user_id'";
						$p_result  = $db_conn->query($p_query);

						if($p_result){
						$db_conn->commit();
						echo '<div class="alert alert-info"> The account'.$username. ' has been successfully created  </div>';
						MSUtility::redirect('adminhome.php');
						}
					}
				}
		} catch (PDOException $e) {
			$db_conn->rollback();
			
			$url = "registeradmin.php?error= Sorry, a system error occured. We appologize for the inconvinience.";
			MSUtility::redirect($url);
		}
	}//end if all fields are valid
}// end if isset

?>