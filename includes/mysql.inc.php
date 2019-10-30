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
    
    private $host ; // stores the host address
    private $dbname ; // stores database name
    private $username ; // stores the database username
    private $password ; // stores the database password
    
    private $db_conn ; // stores the database connection object




    /* class constructor
    *  calls the set method to set 
    *  the class fields
     * i.e 
     * sets the host, username, password 
     * and dbname.
     * and then returns a database 
     * connection object
    */
    public function __construct() {
        
        // sets the default host name
        $this->set_host("localhost");
        
        // sets the database name
        $this->set_dbname('franchisedb');
        
        // sets the username
        $this->set_username('root');
        
        // sets the password
        $this->set_password('');
        
        // calls the setup_conn() to set up the connection
        $this->setup_conn();
//        $this->get_conn();
        
    } // End of class method __construct()
    
    
    /*
     * Method set_host()
     * sets or initializes the host
     */
     public function set_host($host){
         
         $this->host = $host;
         
     } // End of method set_host($host)
    
     
     /*
      * Method set_dbname()
      * sets or initializes the database name
      */
     public function set_dbname($dbname){
         
         $this->dbname = $dbname;
         
     } // End of method set_dbname($dbname)
     
     /*
      * Method set_username()
      * sets or initializes the username
      */
     public function set_username($username){
         
         $this->username = $username;
         
     } // End of method set_username($username)
     
     
     /*
      * Method set_password()
      * sets or initializes the password
      */
     public function set_password($password){
         
         $this->password = $password;
         
     } // End of method set_password($password)
     
     
     /*
      * private Method get_host()
      * retrieves the host 
      */
     private function get_host(){
         
         return $this->host;
         
     } // End of method get_host()
     
     
     /*
      * private Method get_dbname()
      * retrieves the database name 
      */
     private function get_dbname(){
         
         return $this->dbname;
         
     } // End of method get_dbname()
     
     
     /*
      * private Method get_username()
      * retrieves the password 
      */
     private function get_username(){
         
         return $this->username;
         
     } // End of method get_username()
     
     
     /*
      * private Method get_password()
      * retrieves the password 
      */
     private function get_password(){
         
         return $this->password;
         
     } // End of method get_password()
    
     
     /*
      * Method setup_conn()
      *  - get the host, username e.t.c via
      *  - the get methods(private)
      *  - create a new database connection 
      *    object
      *  - and store it in the class attribute
      *  - $db_conn
      */
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
     
    
} // End of class dataBO --Database Object

//$dbo_local = new DataBO();


//// Testing the DataBO class object $dbo_local
//if($dbo_local->get_conn()){
//    echo "Database Connection Succeeded";
//}else{
//    echo "Could not connect to the database";
//}