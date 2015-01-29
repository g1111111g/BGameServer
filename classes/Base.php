<?php
require_once('protocol/pb_proto_foo.php');
class Base{
	function test($a, $b){
		$calc = $a + $b;
		$result = new Result();
		$result->setA($a);
		$result->setB($b);
		$result->setC($calc);
		return $result;
	}	
}
?>
