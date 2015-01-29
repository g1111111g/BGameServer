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

	function testApcAdd(){
		apc_store("apckey", array(1,2,3));
	}

	function testApcGet(){
		print_r(apc_fetch("apckey"));
	}

	function testApcDelete(){
		apc_delete("apckey");
	}
	function throwexception(){
		throw new GameException("my exception", 1111);
	}
}
?>
