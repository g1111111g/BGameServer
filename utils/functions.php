<?php

function objectToArray($d) {
		if (is_object($d)) {
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			return array_map(__FUNCTION__, $d);
		}
		else {
			return $d;
		}
}

function sortAsociativeArray($x, $y){
	if($x["pvppoints"] == $y["pvppoints"]){
		return 0;
	}elseif ($x["pvppoints"] > $y["pvppoints"]) {
		return -1;
	}else{
		return 1;
	}
}

function getTimeDiff($date1, $date2=""){
	$time1 = date_create($date1);
	if(empty($date2)){
		$time2 = date_create();
	}else{
		$time2 = date_create($date2);
	}
	$interval = date_diff($time2, $time1);
	return get_object_vars($interval);
}
function getDateInterval($date1, $date2){
	$diff = abs(strtotime($date2) - strtotime($date1));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
	$minutes  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
	$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60)); 

	$finalDate = array("years" => $years, "months" => $months, "days" => $days , "hours" => $hours , "minutes" => $minutes, "seconds" => $seconds);

	$finalDate["info"] = $years . "-" . $months . "-" . $days . "-" . $hours . "-" .$minutes . "-" . $seconds;
	
	return $finalDate;	
}


function getHmacSha1Signature($params, $appSecret){
	ksort($params);
	$sigStr = '';
// 	foreach($params as $key=>$value) {
// 		$sigStr .= $key."=".$value."&";
// 	}
	$sigStr = urldecode(http_build_query($params));
	return hash_hmac("sha1", $sigStr, $appSecret);
}

/**
* @brief writeData 
* write file with lock
*
* @param $path
* @param $mode
* @param $data
*
* @return bool
*/ 
function writeData($path, $mode, $data){ 
	$dir_name = dirname($path);
	if(!is_dir($dir_name)){
		mkdir($dir_name, 0777, true);
	}
	$fp          = fopen($path, $mode); 
	$retries     = 0;
	$max_retries = 100; 
	do {
		if ($retries > 0) {
			usleep(rand(1, 10000));
		}
		$retries += 1;
	}while (!flock($fp, LOCK_EX | LOCK_NB) and $retries <= $max_retries); 

	if ($retries == $max_retries) {
		return false;
	}

	fwrite($fp, "$data\r\n");
	flock($fp, LOCK_UN);
	fclose($fp); 
	return true; 
}

function microtime_float()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}
?>
