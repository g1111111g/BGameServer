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

function getUUID(){
        $pr_bits = false;
        if ($this instanceof uuid ) {
            if (is_resource ( $this->urand )) {
                $pr_bits .= @fread ( $this->urand, 16 );
            }
        }
        if (! $pr_bits) {
            $fp = @fopen ( '/dev/urandom', 'rb' );
            if ($fp !== false) {
                $pr_bits .= @fread ( $fp, 16 );
                @fclose ( $fp );
            } else {
                // If /dev/urandom isn't available (eg: in non-unix systems), use mt_rand().
                $pr_bits = "";
                for($cnt = 0; $cnt < 16; $cnt ++) {
                    $pr_bits .= chr ( mt_rand ( 0, 255 ) );
                }
            }
        }
        $time_low = bin2hex ( substr ( $pr_bits, 0, 4 ) );
        $time_mid = bin2hex ( substr ( $pr_bits, 4, 2 ) );
        $time_hi_and_version = bin2hex ( substr ( $pr_bits, 6, 2 ) );
        $clock_seq_hi_and_reserved = bin2hex ( substr ( $pr_bits, 8, 2 ) );
        $node = bin2hex ( substr ( $pr_bits, 10, 6 ) );
        
        /**
         * Set the four most significant bits (bits 12 through 15) of the
         * time_hi_and_version field to the 4-bit version number from
         * Section 4.1.3.
         * @see http://tools.ietf.org/html/rfc4122#section-4.1.3
         */
        $time_hi_and_version = hexdec ( $time_hi_and_version );
        $time_hi_and_version = $time_hi_and_version >> 4;
        $time_hi_and_version = $time_hi_and_version | 0x4000;
        
        /**
         * Set the two most significant bits (bits 6 and 7) of the
         * clock_seq_hi_and_reserved to zero and one, respectively.
         */
        $clock_seq_hi_and_reserved = hexdec ( $clock_seq_hi_and_reserved );
        $clock_seq_hi_and_reserved = $clock_seq_hi_and_reserved >> 2;
        $clock_seq_hi_and_reserved = $clock_seq_hi_and_reserved | 0x8000;
        
        return sprintf ( '%08s-%04s-%04x-%04x-%012s', $time_low, $time_mid, $time_hi_and_version, $clock_seq_hi_and_reserved, $node );
}

function createGuid(){
	$chrid = strtoupper(md5(uniqid(mt_rand(), true)));
	$hypen = chr(45);	//'-'
	$uuid = substr($chrid, 6, 2).substr($chrid, 4, 2).substr($chrid, 2, 2).substr($chrid, 0, 2).$hypen.substr($charid, 10, 2).substr($charid, 8, 2).$hyphen.substr($charid,14, 2).substr($charid,12, 2).$hyphen.substr($charid,16, 4).$hyphen.substr($charid,20,12);
	return $uuid;
}
?>
