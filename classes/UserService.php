<?php
class UserService extends Base{

	public function getUserInfo($userId){
		//print_r($this->simpleQuery(SQL::$getUserById, array(':userid' => $userId)));
		$this->query(SQL::$getUserById, array(':userid' => $userId));
		while(FALSE != ($row = $this->fetch())){
			print_r($row);
		}
	}	

	public function testMemcacheAdd(){
		$this->memcacheAdd('key', 'value');
		$this->memcacheAdd('key1', 'value1');
	}

	public function testMemcacheGet(){
		print_r($this->memcacheGet(array('key', 'key1')));
	}

	public function testGetUUID(){
	//	echo getUUID();
		//echo createGuid();
		$this->getIdFromDb("abcde");
	}

	/** needTransaction */
	public function testAddUser(){
		echo "haha";	
	}

	public function getDbVersion(){
		$this->logger->info($_REQUEST);
		$this->logger->info(file_get_contents("php://input"));
		echo $this->getMysqlVersion();
	}
	
}
?>
