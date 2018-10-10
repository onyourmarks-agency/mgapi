<?php
/**
This Example shows how to campaignSendNow using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$cid = $campaignId;

$retval = $api->campaignSendNow($cid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignSendNow()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Campaign Sent!\n";
}
