<?php
	
	//start output buffering to prevent header already sent error
	ob_start();
	session_name('franchise');
	session_start();
	//session_regenerate_id(true);

require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');

if(isset($_POST['submitted']) && !empty($_POST['submitted'])){
	$fname = MSUtility::filterPostString('fname');
	$lname= MSUtility::filterPostString('lname');
	$oname = MSUtility::filterPostString('oname');
	$email = MSUtility::validateEmail('email');
	$username = MSUtility::filterPostString('username');
	$pass = MSUtility::filterPostString('password');
	$cpass = MSUtility::filterPostString('cpassword');
    $address = MSUtility::filterPostString('address');
    $phone_no = MSUtility::filterPostString('phone_no');
	$status =1;
	$acc_type = 1;

	//declare an array $error to store errors
	$error = array();

	//if all the fields are valid
	if($fname && $lname && $oname && $email && $username && $pass && $cpass && $address && $phone_no){
		//check to see that both passwords match

		if( $cpass != $pass){
       //die();    
			$error[]="Passwords Do not Match";

		}
 
		//require database connection
		require_once DB;
		$db_obj = new DataBO();
        $db_conn = $db_obj->get_conn();

        if($db_conn){

        	//check if a user with the username already exist
        	$sql1 = "SELECT * FROM user WHERE username='$username'";

        	// run the Query
             $stmt = $db_conn->query($sql1);
             
             if($stmt){ // if the Query ran successfully
                 
                 if($stmt->rowCount() == 1){ // if the user exists
                     // redirect the user to register.php with an error message
                     $errors[] = "This username is unavailable";
                 }// End of IF
                 
             }// End of Query

             //check if the user email already exist
     			
             $sql3 = "SELECT * FROM user_profile WHERE email='$email'";
             $stmt3 =$db_conn->query($sql3);

             		if($stmt3){
             		//if query ran successfully
             			if($stmt3->rowCount()==1){
             			$errors[]="The email already exist in the database. Try Again!";
             					}
             				}
            //if there are no errors 
             if(empty($errors)){
             	//begin a transaction
             	try{
             			//$db_conn->beginTransaction();
             			//check the access level of if it is a superadmin
             			//$user_query = "SELECT user_id, profile_id,username,account_type FROM user "
             		
             	$in_query = "INSERT INTO user_profile(fname,lname,oname,email,address,phone_no) VALUES('$fname','$lname','$oname','$email','$address','$phone_no')";
             	$in_result= $db_conn->query($in_query);

             	//if the query ran successfully
             	if($in_result){
             		//retrieve the insert id
             		$profile_id = $db_conn->lastinsertid();
             		//use the last insert id to inser the record into user table
             		$user_insert = "INSERT INTO user(username,password,profile_id,account_type,status,creator) VALUES('$username',SHA1('$pass'),'$profile_id',3,1,'self')" ;

             		$user_insert_result= $db_conn->query($user_insert);

             		

             	}

             	}
             	catch(PDOException $ex){
             			//if unsuccessful rollback the transaction
             			$db_conn->rollback();
             			$url = "register.php?error= A System error occured while trying to create the account&el=2";
             	}
             }//end of if
             
        }
        else{
        	 // If the database connection was not successfull redirect with an error message
        	$error =  "Sorry a System Error Occured. We apologize for any inconvenience we've caused you&el=2";
            $url = 'register.php?error='.$error;
            // redirect to index page
            MSUtility::redirect($url);
    
        }// end db_conn
	}//end check

}

?>