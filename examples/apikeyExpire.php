<?php
/**
This Example shows how to apikeyExpire using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

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
