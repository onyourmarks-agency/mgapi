<?php
/**
This Example shows how to suppressedListSubscribe using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$email_address = $my_email;

$retval = $api->suppressedListSubscribe($email_address);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load suppressedListSubscribe()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}
