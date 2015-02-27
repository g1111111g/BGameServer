<?php
namespace Foo;
const VALUE = 100;
function strlen(){
	return "strlen";
}

echo \Foo\strlen()."\n";
echo VALUE."\n";
echo __dir__."\n";
echo __NAMESPACE__;
?>
