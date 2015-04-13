<?php
class UserService extends Base{
	public function login($account, $password){
		$this->query(SQL::$getUserByAccountPassword, array(':account' => $account, ':password' => $password));
		if(FALSE == ($row = $this->fetch())){
			throw new GameException("帐号密码错", ExceptionCode::$user_error);
		}
		$uuid = new UUID();
		$sessionID = $uuid->get();
		$this->query(SQL::$updateSessionID, array(':sessionid' => $sessionID, ':userid' => $row['UserID']));
		$playerinfo = new PlayerInfoProtoc();
		$playerinfo->setUserid($row['UserID']);
		$playerinfo->setNickname($row['NickName']);
		$playerinfo->setUuid($sessionID);
		$playerinfo->setSex(true);
		print_r($playerinfo->dump());
		return $playerinfo;
	}
	
	/** needTransaction */
	public function register($account, $password){
		//这里调用的存储过程里面不要用事务不然此处事务代码会失效
		$id = $this->getIdFromDb("bgame_user");
		$uuid = new UUID();
		$sessionID = $uuid->get();
		$this->query(SQL::$insertBgameUser, array(':userid' => $id, ':account' => $account, ':password' => $password, ':nickname' => '玩家'.$id, ':sessionid' => $sessionID));	
		$this->query(SQL::$insertUserCurrency, array(':userid' => $id));
		return $sessionID;
	} 
	
	public function getUserInfo($userId){
		//print_r($this->simpleQuery(SQL::$getUserById, array(':userid' => $userId)));
		$this->query(SQL::$getUserById, array(':userid' => $userId));
		while(FALSE != ($row = $this->fetch())){
			print_r($row);
		}
		$uuid = new UUID();
		$sessionID = $uuid->get();
		$this->query(SQL::$updateSessionID, array(':sessionid' => $sessionID, ':userid' => $userId));
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
		print_r($this->getIdFromDb("abcde"));
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


class UUID {

    protected $urand;

    public
            function __construct() {
        $this->urand = @fopen('/dev/urandom', 'rb');
    }

    /**
     * @brief Generates a Universally Unique IDentifier, version 4.
     *
     * This function generates a truly random UUID. The built in CakePHP String::uuid() function
     * is not cryptographically secure. You should uses this function instead.
     *
     * @see http://tools.ietf.org/html/rfc4122#section-4.4
     * @see http://en.wikipedia.org/wiki/UUID
     * @return string A UUID, made up of 32 hex digits and 4 hyphens.
     */
    function get() {

        $pr_bits = false;
        if ($this instanceof uuid) {
            if (is_resource($this->urand)) {
                $pr_bits .= @fread($this->urand, 16);
            }
        }
        if (!$pr_bits) {
            $fp = @fopen('/dev/urandom', 'rb');
            if ($fp !== false) {
                $pr_bits .= @fread($fp, 16);
                @fclose($fp);
            } else {
                // If /dev/urandom isn't available (eg: in non-unix systems), use mt_rand().
                $pr_bits = "";
                for ($cnt = 0; $cnt < 16; $cnt ++) {
                    $pr_bits .= chr(mt_rand(0, 255));
                }
            }
        }
        $time_low = bin2hex(substr($pr_bits, 0, 4));
        $time_mid = bin2hex(substr($pr_bits, 4, 2));
        $time_hi_and_version = bin2hex(substr($pr_bits, 6, 2));
        $clock_seq_hi_and_reserved = bin2hex(substr($pr_bits, 8, 2));
        $node = bin2hex(substr($pr_bits, 10, 6));

        /**
         * Set the four most significant bits (bits 12 through 15) of the
         * time_hi_and_version field to the 4-bit version number from
         * Section 4.1.3.
         * @see http://tools.ietf.org/html/rfc4122#section-4.1.3
         */
        $time_hi_and_version = hexdec($time_hi_and_version);
        $time_hi_and_version = $time_hi_and_version >> 4;
        $time_hi_and_version = $time_hi_and_version | 0x4000;

        /**
         * Set the two most significant bits (bits 6 and 7) of the
         * clock_seq_hi_and_reserved to zero and one, respectively.
         */
        $clock_seq_hi_and_reserved = hexdec($clock_seq_hi_and_reserved);
        $clock_seq_hi_and_reserved = $clock_seq_hi_and_reserved >> 2;
        $clock_seq_hi_and_reserved = $clock_seq_hi_and_reserved | 0x8000;

        return sprintf('%08s-%04s-%04x-%04x-%012s', $time_low, $time_mid, $time_hi_and_version, $clock_seq_hi_and_reserved, $node);
    }
}
?>
