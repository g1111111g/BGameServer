<?php
header("Content-Type: text/html; charset=utf-8");

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 * class used to manage the memcache
 * @author 
 *
 */
class MemcacheManager
{
    protected $memcache;
    private static $instance; 
    private $conf;
    
    /**
     * constructor function in which the memcache connection is created
     * @param unknown $cfg
     */
    public function __construct($cfg) {

    	if ($cfg == null)
    	{
    		die("MEMCACHE ERROR: paramaters could not be null");
    	}

    	$this->conf = $cfg;

    	$this->memcache = new Memcache;
    	$this->memcache->connect($this->conf["host"], $this->conf["port"]);

    	if (!$this->memcache)
    	{
    		die("MEMCACHE ERROR: Could not connect");
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
    public function getMemcache()
    {
        return $this->memcache;
    }
}

?>
