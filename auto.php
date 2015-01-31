<?php
header('Content-Type: text/html; charset=utf-8');
if (!($fp = fopen('./config/ClassMethod.php', 'w+'))){
	die('error openfile');
}
$classes = array();
foreach(glob('classes/*.php') as $class){
	$classes[] = substr(basename($class), 0, strpos(basename($class), '.php'));
	include_once $class;
}
vfprintf($fp, "%s\n%s\n%s\n\t%s\n", array('<?php', '/** This script is auto generate by auto.php,do not modify this manual */', 'class ClassMethodName{', 'public static $CLASS_METHOD = array('));

foreach($classes as $class){
	$classObj = new ReflectionClass($class);
	$parentMethods = $classObj->getMethods(ReflectionMethod::IS_PUBLIC);
	$index = 0;
	vfprintf($fp, "\t\t%s\n", array('\''.$class.'\' => array('));
	foreach($parentMethods as $m){
		vfprintf($fp, "\t\t\t%s\t%s\n", array($index++.' => \''.$m->getName().'\',', $m->getDocComment()));
	}
	vfprintf($fp,"\t\t%s\n", array('),'));
}

vfprintf($fp, "\t%s\n", array(');'));
vfprintf($fp, "%s\n%s", array('}', '?>'));
if(!fclose($fp)){
	die("error close file");
}
echo "Generate ClassMethod.php Success!!!";
?>
