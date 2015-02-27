<?php
class GameException extends Exception{
	const USER_ERROR = 10001;
	const NET_ERROR = 10002;
	const DB_ERROR = 10003;
	public function __construct($message, $code = 0){
		parent::__construct($message, $code);
	}

	public function toBinData($useBin){
		if($useBin){
			
		}else{
				
		}
	}
}
?>
