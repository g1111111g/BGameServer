<?php
header('Content-Type: text/html; charset=utf-8');
if (!($fp = fopen('./config/ClassMethod.php', 'w+'))){
	die('error openfile');
}
$classes = array();
foreach(glob('classes/*.php') as $class){
	include_once $class;
}

foreach(glob('classes/*Service.php') as $class){
	$classes[] = substr(basename($class), 0, strpos(basename($class), '.php'));
}
vfprintf($fp, "%s\n%s\n%s\n\t%s\n", array('<?php', '/** This script is auto generate by auto.php,do not modify this manual */', 'class ClassMethodName{', 'public static $CLASS_METHOD = array('));

foreach($classes as $class){
	$classObj = new ReflectionClass($class);
	$parentMethods = $classObj->getMethods(ReflectionMethod::IS_PUBLIC);
	$index = 0;
	vfprintf($fp, "\t\t%s\n", array('\''.$class.'\' => array('));
 
	$needtrancation = 0;
	foreach($parentMethods as $m){
		if(stripos($m->getDocComment(), 'needtransaction')){
			$needtrancation = 1;
		}
		if(stripos($m->getDocComment(), 'notforclient')){
			continue;
		}
		vfprintf($fp, "\t\t\t%s\t%s\n", array($index++.' => array(\''.$m->getName().'\','.$needtrancation.'),', $m->getDocComment()));
		$needtrancation = 0;
	}
	vfprintf($fp,"\t\t%s\n", array('),'));
}

vfprintf($fp, "\t%s\n", array(');'));

vfprintf($fp, "\t%s\n", array('public static $CLASS = array('));
$index = 0;
foreach($classes as $class){
	vfprintf($fp, "\t\t%s\n", array($index++.' => \''.$class.'\','));
}
vfprintf($fp, "\t%s\n", array(');'));

vfprintf($fp, "%s\n%s", array('}', '?>'));
if(!fclose($fp)){
	die("error close file");
}
echo "Generate ClassMethod.php Success!!!";
if (false != ($fp = fopen('./config/ClassMethod.php', 'r'))){
	while(false != ($buffer = fgets($fp, 4096))){
		echo $buffer;
	}
	if(!feof($fp)){
		echo "error eof";
	}
	fclose($fp);
}
?>
