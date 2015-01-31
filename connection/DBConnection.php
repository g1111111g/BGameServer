<?php
class DBConnection implements IConnection{

    protected $connection;
    private static $instance; 
    
    public function __construct() {
    	/*
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
        }*/
	try{
		$dsn = 'mysql:dbname=yue;host=127.0.0.1;port=3306';
		$username = 'root';
		$password = 'root';
		$options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
				PDO::ATTR_PERSISTENT => true	/*持久化连接*/
		);
		$this->connection = new PDO($dsn, $username, $password, $options);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(Exception $e){
		die("db connect error ".$e->getMessage());
	}
    }
    
    public static function getInstance(){ 
        if (!self::$instance instanceof self) {
            self::$instance = new self(); 
        } 
        return self::$instance; 
    }

    public function getConnection(){
        return $this->connection;
    }
}

?>
