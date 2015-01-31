<?php
class MemcacheConnection implements IConnection
{
    protected $memcache;
    private static $instance; 
    
    public function __construct() {
    	try{
		$this->memcache = new Memcache;
		$this->memcache->addServer("127.0.0.1", 11211);
		$this->memcache->setCompressThreshold(500*1024, 0.2);
		//$this->memcache->pconnect("127.0.0.1", 11211);
	}catch(Exception $e){
		die("memcache connect error".$e->getMessage());
	}
    }
    
    public static function getInstance($cfg=null){ 
        if (!self::$instance instanceof self){
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
    public function getConnection(){
        return $this->memcache;
    }
}

?>
