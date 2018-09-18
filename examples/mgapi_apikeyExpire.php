<?php
/**
This Example shows how to apikeyExpire using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$username = "username";
$password = "password";

$retval = $api->apikeyExpire($username, $password);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to expire API key!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {    
	echo "Returned: ".$retval."\n";
}