<?php
/**
This Example shows how to campaignResume using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $campaignId;

$retval = $api->campaignResume($cid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignResume()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Campaign Resumed!\n";
}