<?php
/**
This Example shows how to apikeyAdd using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$username = "username";
$password = "password";

$retval = $api->apikeyAdd($username, $password);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to add new API key!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {    
	echo "Returned new API key: ".$retval."\n";
}
