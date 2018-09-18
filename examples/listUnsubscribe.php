<?php
/**
This Example shows how to listUnsubscribe using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$email_address = $my_email;
$delete_member = false;
$send_goodbye = true;
$send_notify = false;

$retval = $api->listUnsubscribe($id, $email_address, $delete_member, $send_goodbye, $send_notify);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listUnsubscribe()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}