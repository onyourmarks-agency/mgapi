<?php
/**
This Example shows how to listBatchUnsubscribe using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$emails = array($my_email, $boss_man_email);
$delete_member = false;
$send_goodbye = true;
$send_notify = false;

$retval = $api->listBatchUnsubscribe($id, $emails, $delete_member, $send_goodbye, $send_notify);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listBatchUnsubscribe()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "success:".$retval['success_count']."\n";
	echo "errors:".$retval['error_count']."\n";
	foreach($retval['errors'] as $val){
		echo "\t*".$val['email']. " failed\n";
		echo "\tcode:".$val['code']."\n";
		echo "\tmsg :".$val['message']."\n\n";
	}
}