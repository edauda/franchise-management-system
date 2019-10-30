<?php #script 2.1 - config.inc.php

#**************************#
#******** SETTINGS ********#

// Errors are emailed here.
$contact_email = 'edauda34@gmail.com'; // 


// Determine whether we're working on a local server
// or on real server:

if(stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'], 0, 7) == '192.168')){
    
    $local = TRUE; // it is a local server
    
} else {
    
    $local = FALSE; // it is a remote server
    
} // end of IF--Else Conditional Statement


// Determine location of files and URL of the Site:
// Allow for development on different servers.
#*
#*
// if the site is accessed from the localhost or local system server
// show or display bugs and 
// Define full path for the site while on the localhost or system

    
    // Always debug when running locally:
    $debug = TRUE;
    
    // Define the constants:
    // 
    // The BASE_URI defines the absolute path to the 
    // application on the localserver or localhost

    define('BASE_URI', 'C:\xampp\htdocs\franchise-management-system'); 
   
    
    // The BASE_URL defines the path to the site via the 
    // localhost server
  
    define('BASE_URL', 'http://localhost/franchise-management-system/');

    
    // The DB constant defines the absolute path to the database
    // mysql.inc.php connection file
    define('DB', 'C:\xampp\htdocs\franchise-management-system\includes\mysql.php'); // for the windows system
  
   
    
    // the UPLOAD constant defines the apsolute path to the uploads folder
      define('UPLOAD', 'C:\xampp\htdocs\franchise-management-system\uploads\\'); // for the windows system
 
   
   // the IMAGE_PATH constant defines the apsolute path to the images folder
    define('IMAGE_PATH', 'C:\xampp\htdocs\franchise-management-system\images\\'); // for the windows system

/*
 * Most important setting...
 * The $debug variable is used to set error management.
 * To debug a specific page, add this to the page:
 * Index.php page:
 

    if($p == 'thismodule'){
        $debug = TRUE;
    }
    
    require_once '..includes/config.inc.php';
    
 * To debug the entire site, do
    
    $debug = TRUE;
    
 * before this next conditional.
 */

// Assume debugging is off.
if(!isset($debug)){
    
    $debug = FALSE;
    
}

#******** SETTINGS ********#
#**************************#


#**********************************#
#******** ERROR MANAGEMENT ********#

// Create the error handler.
// This is my custom error handling function
// Name: my_error_handler(....)
// Purpose: The purpose of this function is to
//          1. display error if the $debug variable 
//          is set to TRUE which is always TRUE 
//          while in localhost. 
//          Or when set to TRUE deliberately.
//          2. But to email all errors to 
//          $contact_email variable when the 
//          $debug variable is set to FALSE.
//          or running remotely on the 
//          production server 
// 
// * $e_number stores the status/level of the 
//   error that occured
// * $e_message stores the error message 
// * $e_file stores the name of the php script 
// * where the error occured
// * $e_line stores the line number where the
//   error occured
// * $e_vars stores the value of the variables
//   when the error occured.

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
    
    global $debug, $contact_email;
    
    // Build the error message.
    $message = "An error occurred in script '$e_file' on line $e_line: \n<br />$e_message\n<br />";
    
    // Add the date and time.
    $message .= "Date/Time: " .date('n-j-Y H:i:s') . "\n<br />";
    
    // Append $e_vars to the $message.
    $message .= "<pre>" . print_r($e_vars, 1). "</pre>\n<br />";
    
    if($debug){ // Show the error if $debug is set to TRUE 
        
        echo "<p class='error'> $message </p>";
        
    } else{
        
        // Instead Log the error since $debug is set to FALSE:
        // How? by emailing it
        error_log($message, 1, $contact_email); // Send error message as an email to $contact_email
        
        // Only print an error message if the error 
        // isn't a notice or strict.
        if(($e_number != E_NOTICE) && ($e_number < 2048)){
            echo '<p class="error">A system error occurred. We apologize for the inconvenience.</p>';
        }
        
    } // End of $debug IF
    
} // End of function my_error_handler() definition


// Use my error handler:
set_error_handler('my_error_handler');

#******** ERROR MANAGEMENT ********#
#**********************************#

?>
