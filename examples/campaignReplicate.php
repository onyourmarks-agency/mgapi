<?php
/**
This Example shows how to campaignReplicate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $campaignId;

$retval = $api->campaignReplicate($cid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignReplicate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "New Campaign Id = ".$retval."\n";
}