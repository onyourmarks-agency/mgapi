<?php
/**
This Example shows how to apikeys using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$username = "username";
$password = "password";
$expired = false;

$retval = $api->apikeys($username, $password, $expired);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to get API keys!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {    
	echo "All API Keys for your account:\n";
	foreach($retval as $key){
		echo "key = ".$key['apikey']."\n";
		echo "\tcreated: = ".$key['created_at']."\n";
		echo "\texpired: = ".$key['expired_at']."\n";
	}
}