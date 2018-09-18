<?php
/**
This Example shows how to listSegmentUpdate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$sid = $segmentId;
$name = 'title';
$value = 'New Title';

$retval = $api->listSegmentUpdate($sid, $name, $value);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listSegmentUpdate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "SUCCESS! \n";
}