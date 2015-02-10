<?php
require_once 'pb_proto_foo.php';

$foo = new Foo();
$foo->setBar(1123123123);
$foo->setBaz('two11111');
$foo->appendSpam(3.1415926);
$foo->appendSpam(4.0);
$foo->setMiao('miaozi');
$result = new Result();
$result->setA(111);
$result->setB(222);
$result->setC(1.111);
$foo->appendRes($result);
/*
$result = new Result();
$result->setA(333);
$result->setB(444);
$result->setC(2.222);
$foo->appendRes($result);
*/
/*
$remotecall = new RemoteCall();
$remotecall->setClassName('User');
$remotecall->setFunctionName('test');

$keyvalue = new KeyValue();
$keyvalue->setParamKey("key1");
$keyvalue->setParamValue("value1");
$remotecall->appendParams($keyvalue);

$keyvalue = new keyValue();
$keyvalue->setParamKey("key2");
$keyvalue->setParamValue("value2");
$remotecall->appendParams($keyvalue);
*/
try{
	$packed = $foo->serializeToString();
}catch(Exception $ex){
	die($ex->getMessage());
}
echo $packed;
file_put_contents("./proto", $packed);
/*
$remotecall->reset();

try {
	$remotecall->parseFromString($packed);
} catch (Exception $ex) {
	die('Upss.. there is a bug in this example');
}
*/

//echo json_encode($foo, true);
//print_r($foo->getResAt(0));
/*
$arr = $foo->getResIterator();
while($arr->valid()){
	print_r($arr->current()->values);
	$arr->next();
}
*/

/*
$result = array();
for($iterator = $remotecall->getParamsIterator(); $iterator->valid(); $iterator->next()){
	$result[$iterator->current()->getParamKey()] = $iterator->current()->getParamValue();
}
print_r($result);
//print_r($result->dump());

*/
?>
