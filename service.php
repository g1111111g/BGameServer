<?php
require_once('exception/GameException.php');
require_once('config/ClassMethod.php');
require_once('utils/functions.php');
foreach(glob('classes/*.php') as $class){
	include_once $class;
}
//fastcgi_finish_request();
$className = $_GET['c'];
$methodIndex = $_GET['f'];
$useBin = isset($_GET['b'])?$_GET['b']:0;
$methodParams = isset($_GET['p'])?json_decode($_GET['p'], true):array();
$needTrancation = 0;
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
	$methodName = ClassMethodName::$CLASS_METHOD[$className][$methodIndex][0];
	$needTrancation = ClassMethodName::$CLASS_METHOD[$className][$methodIndex][1];
	if($needTrancation){
		$beginTransMethod = $classObj->getMethod('beginTransaction');
		$commitMethod = $classObj->getMethod('commit');
		$rollBackMethod = $classObj->getMethod('rollBack');
	}
	$methodObj = $classObj->getMethod($methodName);
	$instance = $classObj->newInstanceArgs();

	if($needTrancation){
		$beginTransMethod->invoke($instance);
		$invokeResult = $methodObj->invokeArgs($instance, $methodParams);
		$commitMethod->invoke($instance);
	}else{
		$invokeResult = $methodObj->invokeArgs($instance, $methodParams);
	}
	echo $invokeResult?$invokeResult->serializeToString():'';
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
	if($needTrancation){
		$rollBackMethod->invoke($instance);
	}
}
?>
