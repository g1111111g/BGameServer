<?php 
class GameService extends Base{
	/** 加入游戏 */
	public function joinGame(){
	}	

	public function beginTransaction(){
		parent::baseBeginTransaction();
	}

	public function commit(){
		parent::baseCommit();
	}

	public function rollBack(){
		parent::baseRollBack();
	}
}
?>
