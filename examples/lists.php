<?php
/**
This Example shows how to lists using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$retval = $api->lists();

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load lists()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Lists returned: ". sizeof($retval). "\n";
	foreach ($retval as $list){
		echo "Id = ".$list['id']." - ".$list['name']."\n";
	}
}
