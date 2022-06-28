<?php

/**
 * A class file to connect to database
 */
class DB_CONNECT
 {

    // constructor
    function __construct()
 {
        // connecting to database
        return $this->connect();
    }


    // destructor
    function __destruct()
 {
        // closing db connection
        $this->close();
    }

  
  /**
     * Function to connect with database
     */
    
function connect() {
        // import database connection variables
        require_once 'db_config.php';

        // Connecting to mysql database
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error($con));
        
        // returing connection cursor
        return $con;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysqli_close(mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE));
    }

}
