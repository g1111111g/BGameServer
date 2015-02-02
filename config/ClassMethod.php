<?php
/** This script is auto generate by auto.php,do not modify this manual */
class ClassMethodName{
	public static $CLASS_METHOD = array(
		'GameService' => array(
			0 => array('joinGame',0),	/** 加入游戏 */
			1 => array('beginTransaction',0),	
			2 => array('commit',0),	
			3 => array('rollBack',0),	
			4 => array('__construct',0),	
			5 => array('test',1),	/** @needtrancation */
			6 => array('throwException',0),	
			7 => array('testTransaction',0),	
			8 => array('testSql',0),	
		),
		'UserService' => array(
			0 => array('getUserInfo',0),	
			1 => array('testMemcacheAdd',0),	
			2 => array('testMemcacheGet',0),	
			3 => array('testGetUUID',0),	
			4 => array('testAddUser',1),	/** needTrancation */
			5 => array('beginTransaction',0),	
			6 => array('commit',0),	
			7 => array('rollBack',0),	
			8 => array('__construct',0),	
			9 => array('test',1),	/** @needtrancation */
			10 => array('throwException',0),	
			11 => array('testTransaction',0),	
			12 => array('testSql',0),	
		),
	);
	public static $CLASS = array(
		0 => 'GameService',
		1 => 'UserService',
	);
}
?>