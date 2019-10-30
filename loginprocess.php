<?php
	//start output buffering to prevent header already sent error
	//ob_start();
	session_name('franchise');
	session_start();
	session_regenerate_id(true);

require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');

if(isset($_POST['submitted']) && !empty($_POST['submitted'])){
	//if all the fields are valid
	$user_name = MSUtility::filterPostString('username');
	$pass = MSUtility::filterPostString('password');

	if($user_name && $pass){
		require_once DB;
		$db_obj = new DataBO() ;
		$db_conn = $db_obj->get_conn();

		//if the database connection was successful
		if($db_conn){
			//check if the supplied username and password corresponds 
			//to the value in the database
			$sql = "SELECT user_id, profile_id, username, password, account_type, status FROM user WHERE username='$user_name' AND password= SHA1('$pass') AND status=1 ";
			$stmt = $db_conn->query($sql);

			if($stmt){
					//if query ran successfully
					//check if the user exist
					if($stmt->rowCount()==1){
						$row = $stmt->fetch();
						$user_id = $row[1];
						$user_name = $row[2];

						//store the username and userid in session
						$_SESSION['user'] = $user_name;
						$_SESSION['id'] = $user_id;
						//echo $_SESSION['user'];
						//die();
						//echo "The User Exist! " . $user_name; 

						//check the type of user i.e if it is admin or normal user
						$sql2 =  "SELECT user_id, profile_id, username, password, account_type, status FROM user WHERE username='$user_name' AND password= SHA1('$pass') AND status=1 ";
						$query2 = $db_conn->query($sql2);

              		 while ($u_row=$query2->fetch()) {
              		 	$user_type = $u_row['account_type'];
                         

                          if($user_type==1 || $user_type==2){
                          	 	//echo "Yea! you are an admin </br>"; 
                               // echo "Welcome ". $user_name;
                          		$url = "adminhome.php";
                          		MSUtility::redirect($url);

                          }//end if user_type

                            elseif($user_type==3){
                            	//echo "Yea! you are a normal user </br>" ;
                                //echo "Welcome ". $user_name;
                                $url = "index.php";
                          		MSUtility::redirect($url);
                          		
                             }// end else if condition
                            else{
                            	echo "Invalid Login details. Try Again!";
                            	$url = "login.php";
                            	MSUtility::redirect($url);
                           		 }// if of if else if condition

              			 }//end while statement
						} //end if check for existing user
					else{
						echo "Sorry the User " . $user_name . " does not Exist!";
						$url = "login.php";
                         MSUtility::redirect($url);
					}
					
				} //end if $stmt
				exit();
		}// end if database connection

	}//end if username and password are supplied
}

?>