<?php

// require once the Utilities.php file
require 'Utilities.php';

/**
 * Description of MUtility
 * this is a More Specific Utility Class
 * and Inherits Class Utilities
 * Helps reduce
 *  Common Process Redundancy such as 
 *  - Redirection and other potential process
 * @author Chinaka Light
 */

class MSUtility extends Utilities {
    
    
    // Function getuserid
    /*
     * Aim to retrieve the user id of the user from the string
     * and return the value to the calling function or instruction
     */
    public static function getUserId($string){
        
        // Please note that 14 is the length of the salt concatenated to the user id
        // i.e "hiddenpassword" - len = 14
        
        $stringlen = strlen($string); // get the length of the entire string
        $stringlen = $stringlen - 14; // subtract 14 - the length of the password from the total length
        $string_value = substr($string, 14, $stringlen );
        
        return $string_value;
        
    }// End of method getUserId
    
    
    /*
     * Method Name: getuserdetails()
     * Aim: to get all user details via database as any point in time
     *      where user details is needed instead of using the session
     */
    public function getuserdetails($user_id){
     
        if(file_exists('../includes/config.inc.php')){
            
            require_once '../includes/config.inc.php';
            
        }else if(file_exists('includes/config.inc.php')){
            
            require_once 'includes/config.inc.php';
            
        } // End of if
        
        
        // require database connection
        require_once DB;
        
        // Create a new database object
        $db_obj = new DataBO();
        
        $db_conn = $db_obj->get_conn(); // get connection object

        $sql1 = "SELECT user_id, account_type FROM user WHERE user_id=$user_id";
        //run the query
        $stmt = $db_conn->query($sql1);
        $acc_type = null;
        
        if($stmt){
            $row = $stmt->fetch();
            $acc_type = $row['account_type'];

        }
        
        
 
      
            
        
    } // End of getuserdetails

    

    // Function redirect redirects Page to the desired page
    // Parameters needed is only the page?unknown=known
    public static function redirect($filename_parameters){
                
                
                // Checks if this file exists
                if(file_exists('includes/config.inc.php')){
                    
                    // require the file for config.inc.php
                    require_once 'includes/config.inc.php';
                    
                }elseif(file_exists('../includes/config.inc.php')){
                    
                    // require the file since it exists
                    require_once '../includes/config.inc.php';
                    
                }// End of IF_Else_IF
                
                
               // Redirect the user to the admin page
               // Create the url
               $url = BASE_URL . "$filename_parameters";
               //echo "$filename_parameters name file was used to create the complete url";
               
               //echo "<br />redirected at this point";
               header("Location: $url");
               
               
               exit(); // Will Exit the Once the Script is Complete
        
    } // End of method redirect
    
    // method checklogin
    // Checks if the user is logged in
    // And returns true if the
    // session is currently active
    // But returns FLASE if the user is not logged in
    public static function checklogin(){
        
        // This checks if the users is logged in by 
        // checking if the user-id of the session is already set and
        // the uagent of the session is also set and that the 
        // the md5 of the concatenation of the browser http user agent properties
        // concatenated with the user id is consistent
        // else it logs the user out
        
        
        if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['uagent']) && 
                ($_SESSION['user']['uagent'] == md5($_SESSION['user']['id'] . $_SERVER['HTTP_USER_AGENT']))){
            
            // Then this user has access right
            return true;
            
        } // End of IF
        else{
            // this is an unauthorized user
            return false;
        }// End of IF__Else

    }// End of checklogin
    
    
} // End Of class MUtility
