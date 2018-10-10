<?php
/**
This Example shows how to smsCampaignReplicate using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$cid = $smsCampaignId;

$retval = $api->smsCampaignReplicate($cid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load smsCampaignReplicate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "New SMS Campaign Id = ".$retval."\n";
}
