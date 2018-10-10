<?php
/**
This Example shows how to listSegmentDelete using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$sid = $segmentId;

$retval = $api->listSegmentDelete($sid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listSegmentDelete()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Segment Deleted!\n";
}
