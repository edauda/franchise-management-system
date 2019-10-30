<?php
/* 
 * Script 1.0 : mysql.inc.php
 * Aim: This Script contains classes 
 *      neccessary for accessing 
 *      mysql database.
 */


/**
 * Author: Dauda Emmanuel
 * Class Name: DataBO
 * Aim: To Create Database Connection
 *      Using OOP 
 * 
 * Class Fields or Attributes are
 * - $host : stores the host name or address
 * - $dbname: stores the database name
 * - $username: stores the database username
 * - $password: stores the database password
 * 
 * Defaults:
 *    All class attributes or fields are already
 *    set in the constructor
 *    but can be manipulated as explained 
 *    below.
 * 
 * Possible Manipulations:
 *      -You can set the host, database name,
 *       password, username via their set methods
 *     
 */

class DataBO{
private $host ;
private $dbname;
private $username;
private $password;
private $dbconn;

//class constructor
//calls the set method to set the class fields
//i.e sets the hostname, username, password, db connection

public function __construct(){
	//sets the default hostname
	$this->set_host('localhost');
	$this->set_dbname('franchisedb');
	$this->set_username('root');
	$this->set_password('');
	$this->setup_conn();

} //End of class method __construct

/*
*method set_host()
*initializes or set the host name
*/
public function set_host($host){
	$this->host = $host;
} //end of set_host($host)
/* 
*method set_dbname()
*initializes or sets the database name
*/

public function set_dbname($dbname){
	$this->dbname = $dbname;
} //end of set_dbname

/* 
*method set_username()
*initializes or sets the username
*/
public function set_username($username){
	$this->username = $username;
} //End of set_username($username)

/* 
*method set_password()
*initializes or sets the password
*/
public function set_password($password){
	$this->password = $password;
} //End of set_password($password)


//Private methods to Retrieve host,dbname,username,password respectively

/*
*Private method get_host()
*Retrieves the host
*/
private function get_host(){
	return $this->host;
} //end of get_host()

/*
*private method get_dbname()
*Retrieves the username
*/
private function get_username(){
	return $this->username;

} //end of get_username

/*
*private method get_dbname()
*Retrieves the database name
*/
private function get_dbname(){
	return $this->dbname;
}//end of get_dbname

/*
*private method get_password
*Retrieves the password
*/
private function get_password(){
	return $this->password;
}//end of get_password()

 
  public function setup_conn(){
         
         $host = self::get_host();
         $dbname = self::get_dbname();
         $username = self::get_username();
         $password = self::get_password();
         
         
         try{ // tries to connect to the database
         
         $this->db_conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
         
         }  catch (Exception $e){ // could not connect to the database
             
             $this->db_conn = FALSE;
             
         }
         
     } // End of method setup_conn()

      /*
      * Method get_conn()
      *  - returns the active connection object
      *    stored in the field variable $db_conn
      * - This methods expects that set_conn
      *   would be called first. And it is 
      *   always called first in the constructor 
      */
     public function get_conn(){
         
         return $this->db_conn;
        
     } // End of method get_conn()


     /*
      * Static Method setup_and_get_conn(..)
      *  - accepts/takes three parameters
      *   * host, database name, username and
      *   * password
      */
     public static function setup_and_get_conn($host, $dbname, $username, $password){
         
         return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
         
     } // End of method setup_and_get_conn(..)
     
       

}//End of DataOB class
	

?>