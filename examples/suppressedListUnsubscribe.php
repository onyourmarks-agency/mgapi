<?php
/**
This Example shows how to suppressedListUnsubscribe using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$email_address = $my_email;

$retval = $api->suppressedListUnsubscribe($email_address);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load suppressedListUnsubscribe()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}
