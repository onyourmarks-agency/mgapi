<?php
/**
This Example shows how to listUnsubscribe using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$phone = $my_phone;
$delete_member = false;
$send_notify = false;

$retval = $api->listUnsubscribeSMS($id, $phone, $delete_member, $send_notify);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listUnsubscribeSMS()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}