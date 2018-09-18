<?php
/**
This Example shows how to listBatchSubscribe using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$batch = array();
$batch[] = array('SMS'=>$my_phone, 'FNAME'=>'Joe');
$batch[] = array('SMS'=>$boss_phone, 'FNAME'=>'Boss');

$update_existing = false;

$retval = $api->listBatchSubscribeSMS($id, $batch, $update_existing);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listBatchSubscribeSMS()!\n";
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