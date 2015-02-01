<?php
require_once('protocol/pb_proto_foo.php');
require_once('connection/IConnection.php');
require_once('connection/DBConnection.php');
require_once('connection/MemcacheConnection.php');
require_once('config/SQL.php');
class Base{
	private $dbConnection;
	private $memcacheConnection;

	private $db;
	private $pdoStatement;

	private $memcache;

	public function __construct(){
		//$this->dbConnection = DBConnection::getInstance();
		//$this->db = $this->dbConnection->getConnection();
		$this->memcacheConnection = MemcacheConnection::getInstance();
		$this->memcache = $this->memcacheConnection->getConnection();
	}
	/** @needtrancation */
	public function test($a, $b){
		$calc = $a + $b;
		$result = new Result();
		$result->setA($a);
		$result->setB($b);
		$result->setC($calc);
		return $result;
	}
	/** 本地缓存增加key存在则不写入缓存 */
	protected function apcAdd($key, $value, $expire = 3600){
		return apc_add($key, $value, $expire);
	}
	
	protected function apcSet($key, $value, $expire = 3600){
		return apc_store($key, $value, $expire);
	}

	protected function apcGet($key){
		return apc_fetch($key);
	}

	protected function apcDel($key){
		return apc_delete($key);
	}
	
	/** 原子交换Compare And Swap */
	protected function apcCas($key, $old, $new){
		return apc_cas($key, $old, $new);
	}


	/** key存在则不替换 */
	protected function memcacheAdd($key, $value, $compress = false, $expire = 3600){
		if($compress){
			return $this->memcache->add($key, $value, MEMCACHE_COMPRESSED, $expire);
		}
		return $this->memcache->add($key, $value, false, $expire);

	}
	
	/** key存在也替换  */
	protected function memcacheSet($key, $value, $compress, $expire){
		if($compress){
			return $this->memcache->set($key, $value, MEMCACHE_COMPRESSED, $expire);
		}
		return $this->memcache->set($key, $value, false, $expire);

	}

	protected function memcacheDel($key){
		return $this->memcache->delete($key);
	}
	/**
	*
	*@key array or string
	*/
	protected function memcacheGet($key){
		return $this->memcache->get($key);
	}

	public function throwException(){
		throw new GameException("my exception", 1111);
	}
	public function testTransaction($sql, $needtrancation = 1){
		
	}

	public function testSql($accountid){
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

	protected function execQuery($query, $params = array()){
		if(count($params) > 0){
			$keys = array();
			$values = array();

			foreach($params as $key => $value){
				$keys[] = $key;
				$values[] = $this->db->quote($value);
			}
			$query = str_replace($keys, $values, $query);
		}

		//$query = $this->db->quote($query);
		return $this->db->exec($query);
	}

	protected function simpleQuery($query, $params = array()){
		if(count($params) > 0){
			$keys = array();
			$values = array();

			foreach($params as $key => $value){
				$keys[] = $key;
				$values[] = $this->db->quote($value);
			}
			$query = str_replace($keys, $values, $query);
		}
		$sth = $this->db->query($query);
		if(FALSE != ($result = $sth->fetch(PDO::FETCH_NAMED))){
			return $result;
		}
	}
	/**
	*
	* @reuturn 预处理可以防止SQL注入，一次prepare多次execute比多次prepare execute性能要好
	*
	*/
	protected function query($query, $params = array()){
		$this->pdoStatement = $this->db->prepare($query);
		$this->pdoStatement->execute($params);
		return $sth;
	}

	protected function fetch(){
		return $this->pdoStatement->fetch(PDO::FETCH_NAMED);
	}

	//存储过程 start
	protected function prepare($query){
		$this->pdoStatement = $this->db->prepare($query);
	}

	protected function bindParam($index, $value){
		$this->pdoStatement->bindParam($index, $value);	
	}

	protected function execute(){
		$this->pdoStatement->execute($params);
	}
	//存储过程 end
	

	protected function getLastInsertId(){
		return $this->db->lastInsertId();
	}

	protected function beginTransaction(){
		$this->db->beginTransaction();
	}

	protected function commit(){
		$this->db->commit();
	}

	protected function rollBack(){
		$this->db->rollBack();
	}

	/**
	* 
	* obtains the receipt data from ios given the storekit receipt
	* 
	* @access private
	* @param $receipt       the user's social network id
	* @param $sandboxmode   wheter the transaction is executed by a test user or not
	* @return object        containing the receipt data
	*/
	protected function getReceiptData($receipt, $sandboxmode=false)
	{
		if ($sandboxmode) 
		{
		    $endpoint = 'https://sandbox.itunes.apple.com/verifyReceipt';
		}
		else 
		{
		    $endpoint = 'https://buy.itunes.apple.com/verifyReceipt';
		}//$endpoint = 'http://guotanminus.col';

		$postdata = json_encode(
		    array('receipt-data' => $receipt)
		);

		$curl = curl_init($endpoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);

		$response = curl_exec($curl);
		$error = curl_errno($curl);
		$errmessage = curl_error($curl);
		curl_close($curl);

		if ($error != 0) {
		    
		    throw new GameException(ExceptionCode::$net_error, $errmessage, $error);
		}

		$data = json_decode($response);

		if (!is_object($data))
		{
		    throw new GameException(ExceptionCode::$net_error, "Invalid response data");
		}

		if (!isset($data->status) || $data->status != 0)
		{
		    if (!isset($data->status))
			$message = "Response did not contain status property";
		    else
			$message = "status - ".$data->status;
		    
		    throw new GameException(ExceptionCode::$receipt_invalid, "Invalid receipt: ".$message);
		}

		return array(
		    'quantity'       =>  $data->receipt->quantity,
		    'product_id'     =>  $data->receipt->product_id,
		    'transaction_id' =>  $data->receipt->transaction_id,
		    'purchase_date'  =>  $data->receipt->purchase_date,
		    'app_item_id'    =>  $data->receipt->app_item_id,
		    'bid'            =>  $data->receipt->bid,
		    'bvrs'           =>  $data->receipt->bvrs
		);
	}

}
?>
