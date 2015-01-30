<?php
class MemcachConnection
{
    protected $memcache;
    private static $instance; 
    
    public function __construct() {
    	$this->memcache = new Memcache;
    	$this->memcache->connect($this->conf["host"], $this->conf["port"]);

    	if (!$this->memcache){
    		die("MEMCACHE ERROR: Could not connect");
    	}
    }
    
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
