<?php
/** This script is auto generate by auto.php,do not modify this manual */
class ClassMethodName{
	public static $CLASS_METHOD = array(
		'GameService' => array(
			0 => array('joinGame',0),	/** 加入游戏 */
			1 => array('test',0),	/** @needtrancation */
			2 => array('throwException',0),	
			3 => array('testTransaction',0),	
			4 => array('testSql',0),	
		),
		'UserService' => array(
			0 => array('login',0),	
			1 => array('register',1),	/** needTransaction */
			2 => array('getUserInfo',0),	
			3 => array('testMemcacheAdd',0),	
			4 => array('testMemcacheGet',0),	
			5 => array('testGetUUID',0),	
			6 => array('testAddUser',1),	/** needTransaction */
			7 => array('getDbVersion',0),	
			8 => array('test',0),	/** @needtrancation */
			9 => array('throwException',0),	
			10 => array('testTransaction',0),	
			11 => array('testSql',0),	
		),
	);
	public static $CLASS = array(
		0 => 'GameService',
		1 => 'UserService',
	);
}
?>