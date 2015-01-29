<?php
header("Content-Type: text/html; charset=utf-8");

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 * class used to manage the connection with bd 
 * @author 
 *
 */
class ConnectionManager
{
    protected $connection;
    private static $instance; 
    private $conf;
    
    /**
    * 
    * constructor function in which the db connection is created
    * 
    * @access public
    * @param  object $cfg  An Array containing the configuration parameters to the DB
    * @return void
    */
    public function __construct($cfg) {
        
        if ($cfg == null)
        {
            die("CONNECTION ERROR: paramaters could not be null");
        }
        
        $this->conf = $cfg;

        
        $this->connection =  mysqli_connect($this->conf["host"], $this->conf["user"], $this->conf["password"], "", $this->conf["port"]);
        mysqli_set_charset($this->connection, "utf8mb4");
        
        if (!$this->connection)
        {
            die("CONNECTION ERROR: " . mysqli_connect_error($this->connection));
        }
        else
        {
            $db = mysqli_select_db($this->connection, $this->conf["schema"]);
            
            if (!$db)
            {
                die("CONNECTION ERROR, the database ".$this->conf["schema"]." does not exists : " . mysqli_error($this->connection));
            }
        }
    }
    
    /**
    * 
    * obtains an instance of this class
    * 
    * @access public
    * @param  object $cfg  An Array containing the configuration parameters to the DB
    * @return void
    */
    public static function getInstance($cfg=null) 
    { 
        if (!self::$instance instanceof self) 
        {
            self::$instance = new self($cfg); 
        } 
        return self::$instance; 
    }
    
    /**
    * 
    * returns the previously created db connection object
    * 
    * @access public
    * @return object  the database connection object
    */
    public function getConnection()
    {
        return $this->connection;
    }
}

?>
