<?php
/**
This Example shows how to getAccountDetails using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$retval = $api->getAccountDetails();

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to get account info!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {    
	echo "Returned:\n";
	foreach($retval as $key => $value) {
		if(!is_array($value)) {
			echo "\t".$key." = ".$value."\n";
		} else {
			echo "\t".$key.":\n";
			foreach($value as $k => $v) {
				if(!is_array($v)) {
					echo "\t\t".$k." = ".$v."\n";
				} else {
					echo "\t\t".($k + 1).".\n";
					foreach($v as $k_ => $v_) {
						echo "\t\t\t".$k_." = ".$v_."\n";
					}
				}
			}
		}
	}
}
