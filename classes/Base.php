<?php
require_once('protocol/pb_proto_foo.php');
require_once('connection/DBConnection.php');
require_once('connection/MemcacheConnection.php');
require_once('config/SQL.php');
class Base{
	private $dbConnection;
	private $memcacheConnection;
	protected $db;
	protected $memcache;

	public function __construct(){
		$this->dbConnection = DBConnection::getInstance();
		$this->db = $this->dbConnection->getConnection();
	//	$memcacheConnection = MemcacheConnection::getInstance();
	}
	/**
	 	@needtrancation
	 */
	function test($a, $b){
		$calc = $a + $b;
		$result = new Result();
		$result->setA($a);
		$result->setB($b);
		$result->setC($calc);
		return $result;
	}
	/**
		测试缓存增加
	*/
	function testApcAdd(){
		apc_store("apckey", array(1,2,3));
	}

	function testApcGet(){
		print_r(apc_fetch("apckey"));
	}

	function testApcDelete(){
		apc_delete("apckey");
	}
	function throwexception(){
		throw new GameException("my exception", 1111);
	}
	function testTransaction($sql, $needtrancation = 1){
		
	}

	function testSql($accountid){
		$sth = $this->db->prepare(SQL::$getUserByAccountID); 
		$sth->execute(array(':accountid' => $accountid));
		$carDateList = new CarDateList();
		while(FALSE != ($result = $sth->fetch(PDO::FETCH_NAMED))){
			/*
			$carDate = new CarDate();
			$carDate->setDateId($result['DateID']);
			$carDate->setUserId($result['UserID']);
			$carDate->setFrom($result['FromAddr']);
			$carDate->setTo($result['ToAddr']);
			$carDateList->appendDateList($carDate);
			*/
			print_r($result);
		}
		//return $carDateList;
		/*
		try{
			$this->db->beginTransaction();
			$this->db->exec("select * from ");
			$this->db->commit();
		}catch(Exception $e){
			$this->db->rollBack();
			throw $e;
		}*/
	}

	function execQuery($query){
		$query = $this->db->quote($query);
		$this->db->exec($query);
	}

	function query($query){
		$query = $this->db->quote($query);
		$this->db->query($query);
	}

}
?>
