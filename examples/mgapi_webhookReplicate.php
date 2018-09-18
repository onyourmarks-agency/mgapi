<?php
/**
This Example shows how to campaignReplicate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$wid = $webhookId;

$retval = $api->webhookReplicate($wid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load webhookReplicate()!\n";
	echo "\tCode={$api->errorCode}\n";
	echo "\tMsg={$api->errorMessage}\n";
} else {
	echo "New Webhook Id = {$retval}\n";
}
