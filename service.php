<?php
header('Content-Type: text/html; charset=UTF-8');
require_once('exception/GameException.php');
require_once('exception/ExceptionCode.php');
require_once('config/ClassMethod.php');
require_once('utils/functions.php');
foreach(glob('classes/*.php') as $class){
	include_once $class;
}
//fastcgi_finish_request();
$classIndex = filter_input(INPUT_GET, 'c', FILTER_VALIDATE_INT);
$methodIndex = filter_input(INPUT_GET, 'f', FILTER_VALIDATE_INT);
$useBin = isset($_GET['b'])?$_GET['b']:0;
$postData = file_get_contents("php://input");
$methodParams = !empty($postData)?json_decode($postData, true):array();
if(count($methodParams) == 0){
	$methodParams = isset($_GET['p'])?json_decode($_GET['p'], true):array();
}
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
	$className = ClassMethodName::$CLASS[$classIndex];
	$classObj = new ReflectionClass(ClassMethodName::$CLASS[$classIndex]);
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
	//echo $invokeResult;
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
	$classObj->getMethod("warn")->invokeArgs($instance, array("msg"=>"some error", "exception"=>$e));
	if($needTrancation){
		$rollBackMethod->invoke($instance);
	}
}
?>
