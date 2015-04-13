<?php
namespace Foo;
const VALUE = 100;
function strlen(){
	return "strlen";
}
echo \Foo\strlen()."\n";
echo VALUE."\n";
echo __dir__."\n";
echo __NAMESPACE__."\n";
echo filter_var("111", FILTER_VALIDATE_INT, array('options'=>array('default'=>3)));
?>
