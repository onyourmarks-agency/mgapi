<?php
/**
This Example shows how to webhookUpdate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$wid = $webhookId;
$name = 'title';
$value = 'New Title';

$retval = $api->webhookUpdate($wid, $name, $value);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load webhookUpdate()!\n";
	echo "\tCode={$api->errorCode}\n";
	echo "\tMsg={$api->errorMessage}\n";
} else {
	echo "SUCCESS! \n";
}
