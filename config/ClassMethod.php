<?php
class ClassMethodName{
	public static $CLASS_METHOD = array(
		'Base' => array(
			0 => '__construct',	
			1 => 'test',	/** @needtrancation */
			2 => 'throwException',	
			3 => 'testTransaction',	
			4 => 'testSql',	
		),
		'Game' => array(
			0 => 'joinGame',	/** 加入游戏 */
			1 => '__construct',	
			2 => 'test',	/** @needtrancation */
			3 => 'throwException',	
			4 => 'testTransaction',	
			5 => 'testSql',	
		),
		'User' => array(
			0 => 'getUserInfo',	
			1 => 'testMemcacheAdd',	
			2 => 'testMemcacheGet',	
			3 => '__construct',	
			4 => 'test',	/** @needtrancation */
			5 => 'throwException',	
			6 => 'testTransaction',	
			7 => 'testSql',	
		),
	);
}
?>