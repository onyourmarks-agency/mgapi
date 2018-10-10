<?php
/**
This Example shows how to listBatchSubscribe using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$id = $listId;
$batch = array();
$batch[] = array('EMAIL'=>$my_email, 'FNAME'=>'Joe');
$batch[] = array('EMAIL'=>$boss_man_email, 'FNAME'=>'Boss');

$double_optin = true;
$update_existing = false;

$retval = $api->listBatchSubscribe($id, $batch, $double_optin, $update_existing);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listBatchSubscribe()!\n";
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
