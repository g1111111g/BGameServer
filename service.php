<?php
require_once('exception/GameException.php');
foreach(glob('classes/*.php') as $class){
	include_once $class;
}
//fastcgi_finish_request();
$className = $_GET['c'];
$methodName = $_GET['f'];
$useBin = $_GET['b'];
$methodParams = json_decode($_GET['p'], true);
try{
	if(isset($_POST['req'])){
		$reqInfo = new RemoteCall();
		$reqInfo->parseFromString($_POST['req']);
		$className = $reqInfo->getClassName();
		$methodName = $reqInfo->getFunctionName();
		$methodParams = array();
		for($iterator = $reqInfo->getParamsIterator(); $iterator->valid(); $iterator->next()){
			$key = $iterator->current()->getParamKey();
			$value = $iterator->current()->getParamValue();
			$methodParams[$key] = $value;
		}
	}
	$organizedparams = array();
	$classObj = new ReflectionClass($className);
	$methodObj = $classObj->getMethod($methodName);
	$instance = $classObj->newInstanceArgs();
	$invokeResult = $methodObj->invokeArgs($instance, $methodParams);
	echo $invokeResult->serializeToString();
}catch(Exception $e){
	if($e instanceof GameException){
		$gameException = $e;	
	}else{
		$gameException = new GameException($e->getMessage(), $e->getCode());
	}
	//echo $gameException->toBinData($useBin);
	echo $e->getMessage();
}
?>
