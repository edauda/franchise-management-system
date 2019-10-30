<?php


/**
 * Description of Utilities
 * 
 *  Contains Utility Methods Often Needed 
 *  For Commonly Carried Out Functions
 * 
 * @author Chinaka Light
 */
class Utilities {
    
    /*
     *  A no Argument Constructor
     */
    public function __construct() {
        ;
    }
    
    
    /*
     * This method getTruncatedPHP(filename)
     * Returns the name of a file without the php extension
     */
    public function getTruncatedPHP($filename){
        
        // The length of the passed value 
        // must be greater than 4
        
        if(strlen($filename) > 4){
        
        // Trims the value passed
        $nameoffile = trim($filename);
        
        // Gets the length of the Passed value
        $length = strlen($nameoffile);
        
        // Strips off the last four string value
        // And Counts backward to the first
        // String Value
        
        $truncatedfile = substr($nameoffile, 0, $length - 4 );
              
        
        return $truncatedfile;
        
        exit;
        
        }else{
            // Since it is <= 4 return original String
            return $filename;
            exit();
        } // End of IF..Else
        
    } // End of Method getTruncatedPHP
    
    
    /*
     * ===================== STRING MANIPULATION METHODS SECTION =========\\
     */
    
    /*
     * Name removeSpacesInBetween()
     * Aim: To Remove the Space inbetween Strings
     * Output: returns a Concatenated Unspaced String
     * E.g Input: "JSS 1 A". Output: "JSS1A"
     */
    public static function removeSpacesInBetween($spacedstring){
        
        // Tokenizes it and stores each segments into 
        // the elements of an array
        $arr = explode(' ', $spacedstring); 

        $newString = "";

        foreach ($arr as $key => $value) {
            $newString = $newString .$value;
        }

        //echo "<br/>OUTPUT: ".$arrout;
        
        // Returns the New String
        return $newString;
        
    }// End of function removeSpacesInBetween
    
    
    /*
     * Method Name: normal
     */
    
    /*
     * ===================== END OF STRING MANIPULATION METHODS =========\\
     */
    
    
    /*
     * =============== GET VALUES VALIDATION METHODS ==================== 
     */
    
    /*
     * Method Name: filterGetString
     * Aim: to filter the get values of get
     * Parameters: the index value of the get
     *              or the form control element NAME
     */
    public static function filterGetString($get_array_index_value){
        
        $get_index = $get_array_index_value;
        
        $filteredString = filter_input(INPUT_GET, $get_index, FILTER_SANITIZE_STRING);
        
        if($filteredString){
            return $filteredString;
        }else{
            return false;
        }
        
    } // End of method filterGetString
    
    /*
     * Description of method filterGetInt
     * 
     * Method Name: filterGetInt
     * Aim: to filter the get values of get
     * Parameters: the index value of the get
     *              or the form control element NAME
     */
    public static function filterGetInt($get_array_index_value){
        
        $get_index = $get_array_index_value;
        
        $filteredInteger = filter_input(INPUT_GET, $get_index, FILTER_SANITIZE_NUMBER_INT, FILTER_VALIDATE_INT);
        
        if($filteredInteger){
            return $filteredInteger;
        }else{
            return false;
        }
        
    } // End of method filterGetInt
    
    /*
     * =============== END OF GET VALUES VALIDATION METHODS =============
     */
    
    
    /*
     * =============== POST VALUES VALIDATION METHODS ==================== 
     */
    
    /*
     * Method Name: filterPostString
     * Aim: to filter the post values of post
     * Parameters: the index value of the post
     *              or the form control element NAME
     */
    public static function filterPostString($post_array_index_value){
        
        $post_index = $post_array_index_value;
        
        $filteredString = filter_input(INPUT_POST, $post_index, FILTER_SANITIZE_STRING);
        
        if($filteredString){
            return $filteredString;
        }else{
            return false;
        }
        
    } // End of method filterPostString
    
    /*
     * Description of method filterPostInt
     * 
     * Method Name: filterPostInt
     * Aim: to filter the post values of post
     * Parameters: the index value of the post
     *              or the form control element NAME
     */
    public static function filterPostInt($post_array_index_value){
        
        $post_index = $post_array_index_value;
        
        $filteredInteger = filter_input(INPUT_POST, $post_index, FILTER_SANITIZE_NUMBER_INT, FILTER_VALIDATE_INT);
        
        if($filteredInteger){
            return $filteredInteger;
        }else{
            return false;
        }
        
    } // End of method filterPostInt
    
    /*
     * Name: validateEmail
     * Validate mail
     */
    public static function validateEmail($post_array_index_value){
        
        $post_index = $post_array_index_value;
        $validated_email = filter_input(INPUT_POST, $post_index, FILTER_VALIDATE_EMAIL);
        
        if($validated_email){
            return $validated_email;
        }else{
            return false;
        }
        
    }// End of method validateEmail
    
    
    //Name: phone number validation
    // Aim: To validate Phone number
    // Needs modification or refactoring of validating phone numbers
    public static function validatePhone($post_array_index_value){
        
        $post_index = $post_array_index_value;
        $filtered_phone = Utilities::filterPostString($post_index);
        
        // if the the number is less than 10 or greater than
        // needs to be modified
        
        if(strlen($filtered_phone) >= 10 && strlen($filtered_phone) <=15){
            return $filtered_phone;
        }else{
            return false;
        }
        
//        if(trim($_POST['phonenumber']) == '')  {
//    $hasError = true;
//        } else if (!eregi("/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/$",      
//                  trim($_POST['phonenumber']))) {
//            $hasError = true;
//        } else {
//            $phonenumber= trim($_POST['phonenumber']);
//        }

    }// End of method validatePhone


    /*
     * =============== END OF POST VALUES VALIDATION METHODS =============
     */
    
    public function __toString() {
        return "I am Class Utilities";
    }
    
}// End of Class Utilities



// Tests Below Here
/* $uonj = new Utilities();

$va = $uonj->getTruncatedPHP('asasas12.php');

echo $va;

*/

/**
 * Interface SessionManager
 * TO incoporate flexibility
 * so that it could be implemented by 
 * different session handlers
 */
interface SessionManager {
    public function _open($save_path, $session_name);
    public function _close();
    public function _read($id);
    public function _write($id, $sess_data);
    public function _destroy($id);
    public function _gc($maxlifetime);
}


/**
 * Description of Session
 * 
 * Author: Chinaka Light
 * 
 * Aim: This Sesssion Class  is Aimed at 
 *      Storing the session information in the 
 *      database instead of in the session file on the server. 
 *      This is just to improve the site's security
 */
class Session implements SessionManager{
  
  /**
   *
   * @var type DataBo
   * This stores the database object 
   * @access private
   */
  private $db = null;
  
  /**
   * Since the Constructor is  called when the class is created
   * The  Database obejct required to store information in the 
   * database will be created here
   */
  public function __construct() {
    
    
    if(file_exists('../includes/config.inc.php')){
            
            require_once '../includes/config.inc.php';
            
        }else if(file_exists('includes/config.inc.php')){
            
            require_once 'includes/config.inc.php';
            
        } // End of if
        
        
        // require database connection
        require_once DB;
        
        // Create a new database object
        $this->db = new DataBO();
        
        // Change the ini configuration, ...
        ini_set('session.save_handler', 'user');
        
        // Set handler to the class methods to overide SESSION
        session_set_save_handler(
        array(&$this, "_open"),
        array(&$this, "_close"),
        array(&$this, "_read"),
        array(&$this, "_write"),
        array(&$this, "_destroy"),
        array(&$this, "_gc")
        );
        
        // Start the session
        session_start();
        
        // Finally ensure that the session values are stored.
        register_shutdown_function('session_write_close');
        
  }// End of Constructor
  
  
  /**
   * @access public
   * @return boolean 
   * Description
   * Open function
   * Aim: To open the session if the database connection was successfull
   *      By returning true.
   *      It does nothing more since it is not opening file as we are not storing in the database
   */
  public function _open($save_path, $session_name){
    
    // if successfull
    if($this->db){
      // Return true
      return TRUE;
    }
    
    return FALSE;
    
  } // End of function _open
  
  /**
   * Is called when the reading in  a session is completed.
   * The method calls the garbage collector.
   * 
   * @access public
   * @return boolean
   */
  public function _close() {
    // Close the database connection
    // If this database connection is successful
//    if($this->db->close()){
//      return true;
//    }
//    return false;
    
    $this->_gc(100);
    return true;
  }
  
  /**
   * This function is called to read data from a session
   * @access public
   * @param Integer $id Description
   * @return Mixed Description
   */
  public function _read($id) {
    
    // Select a query to get  the session data,...
    $sql_select = "SELECT * FROM sessions WHERE sessions.id= :id LIMIT 1";
    
    // Prepare the statement
    $stmt_select = $this->db->prepare($sql_select);
    
    
    // bind the id parameter to the statement ...
    $stmt_select->bindParam(':id', $id, PDO::PARAM_INT);
    
    //.. and try to execute the query.
    if($stmt_select->execute()){
      // Fetch the result as an associative array
      $result = $stmt_select->fetch(PDO::FETCH_ASSOC);
      
      // .. and validate it
      
      if(!$result){
        throw  new Exception("Error While Retrieving Session");
      }
      
      return $result["value"];
    }
    
    return '';
    
  } // End method _read()
  
  
/**
* Writes data into a session rather
* into the session record in the database.
*
* @access public
* @access Integer $id The id of the current session
* @access String $sess_data The data of the session
* @return Boolean
*/
public function _write($id, $sess_data) {
  
  // vlidate the qiven data.
  if($sess_data == null){
    return TRUE;
  }
  
  // Setup the query to update s session,...
  
  $update = "UPDATE `sessions` SET `last_updated`= :time, `value`=:data WHERE `id`= :id;";
  
  // prepare the statement
  $updatestmt = $this->db->prepare($update);
  
  // bind the parameters to the  statement ...
  $updatestmt->bindParam(':time', time(), PDO::PARAM_INT);
  $updatestmt->bindParam(':data', $sess_data, PDO::PARAM_STR);
  $updatestmt->bindParam(':id', $id, PDO::PARAM_INT);
  
  // tru to execute
  if($updatestmt->execute()){
    
    // Check if  any data was updated.
    if($updatestmt->rowCount() > 0 ){
      return TRUE;
    }else{
      // The session does not exists create a new 
      $insert = "INSERT INTO `sessions`(id, last_updated, start, value) VALUES (:id, :time, :time, :data);";
      
      // prepare the statement
      $insertstmt = $this->db->prepare($insert);

      // bind the parameters to the  statement ...
      $insertstmt->bindParam(':time', time(), PDO::PARAM_INT);
      $insertstmt->bindParam(':data', $sess_data, PDO::PARAM_STR);
      $insertstmt->bindParam(':id', $id, PDO::PARAM_INT);
      
      // and finally  execute it.
      return $insertstmt->execute();
      
    }
  }
  
  return FALSE;
  
}// End of method _write()
  
  

    /**
    * Ends a session and deletes it.
    *
    * @access public
    * @access Integer $id The id of the current session
    * @return Boolean
    */
  public function _destroy($id) {
      // Setup a query to delete the current session, ...
      $delete = "DELETE FROM `sessions` WHERE `sessions`.`id` = :id;";
      
      // prepare the statement
      $deletestmt = $this->db->prepare($delete);
      
      //...bind the parameters to the statement
      $deletestmt->bindParam(':id', $id, PDO::PARAM_INT);
      
      // and execute the query.
      return $deletestmt->execute();
      
  } // End of method destroy
  
  
  /**
  * The garbage collector deletes all sessions from the database
  * that where not deleted by the session_destroy function.
  * so that the session table will stay clean.
  *
  * @access public
  * @access Integer $maxlifetime The maximum session lifetime
  * @return Boolean
  */
  public function _gc($maxlifetime) {
      // Set a period after that a session pass off.
      $maxlifetime = strtotime("-20 minutes");
      // Setup a query to delete discontinued sessions, ...
      $delete = "DELETE FROM
      `sessions`
      WHERE
      `sessions`.`last_updated` < :maxlifetime;";
      // ... prepare the statement, ...
      $deleteStmt = $pdo->prepare($delete);
      // ... bind the parameters to the statement ...
      $deleteStmt->bindParam(':maxlifetime', $maxlifetime, PDO::PARAM_INT);
      // ... and execute the query.
      return $deleteStmt->execute();
}
  
  
} // End of Class Session
