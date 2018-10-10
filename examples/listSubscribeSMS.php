<?php
/**
This Example shows how to listSubscribe using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$id = $listId;
$phone = $my_phone;
$merge_vars = array('SMS'=>$my_phone, 'FNAME'=>'Joe'); // or $merge_vars = array();
$update_existing = false;

$retval = $api->listSubscribeSMS($id, $phone, $merge_vars, $update_existing);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listSubscribeSMS()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}
