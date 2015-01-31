<?php
require_once('exception/GameException.php');
require_once('config/ClassMethod.php');
foreach(glob('classes/*.php') as $class){
	include_once $class;
}
//fastcgi_finish_request();
$className = $_GET['c'];
$methodName = $_GET['f'];
$useBin = $_GET['b'];
$methodParams = json_decode($_GET['p'], true);
$needtrancation = 0;
try{
	if(isset($_POST['req'])){
		$reqInfo = new RemoteCall();
		$reqInfo->parseFromString($_POST['req']);
		$className = $reqInfo->getClassName();
		$methodName = ClassMethodName::$CLASS_METHOD[$className][$reqInfo->getFunctionName()];
		$methodParams = array();
		for($iterator = $reqInfo->getParamsIterator(); $iterator->valid(); $iterator->next()){
			$key = $iterator->current()->getParamKey();
			$value = $iterator->current()->getParamValue();
			$methodParams[$key] = $value;
		}
	}
	$organizedparams = array();
	$classObj = new ReflectionClass($className);
	$methodName = ClassMethodName::$CLASS_METHOD[$className][$methodName];
	$methodObj = $classObj->getMethod($methodName);
	$params = $methodObj->getParameters();
	/*
	foreach($params as $p){
		if($p->getName() == 'needtrancation'){
			$needtrancation = 1;
		}
	}
	*/
	$instance = $classObj->newInstanceArgs();
	$invokeResult = $methodObj->invokeArgs($instance, $methodParams?$methodParams:array());
	echo $invokeResult->serializeToString();
//	error_log($invokeResult->serializeToString());
}catch(Exception $e){
	if($e instanceof GameException){
		$gameException = $e;	
	}else{
		$gameException = new GameException($e->getMessage(), $e->getCode());
	}
	//echo $gameException->toBinData($useBin);
//	echo $e->getMessage();
	echo $e->__toString();
}
?>
