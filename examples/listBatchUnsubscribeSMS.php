<?php
/**
This Example shows how to listBatchUnsubscribe using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$id = $listId;
$phones = array($my_email, $boss_man_email);
$delete_member = false;
$send_notify = false;

$retval = $api->listBatchUnsubscribeSMS($id, $phones, $delete_member, $send_notify);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listBatchUnsubscribeSMS()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "success:".$retval['success_count']."\n";
	echo "errors:".$retval['error_count']."\n";
	foreach($retval['errors'] as $val){
		echo "\t*".$val['phone']. " failed\n";
		echo "\tcode:".$val['code']."\n";
		echo "\tmsg :".$val['message']."\n\n";
	}
}
