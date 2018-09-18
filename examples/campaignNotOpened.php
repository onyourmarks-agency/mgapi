<?php
/**
This Example shows how to campaignNotOpened using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $campaignId;
$start = 0;
$limit = 1000;

$retval = $api->campaignNotOpened($cid, $start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignNotOpened()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	if (sizeof($retval)==0){
		echo "No stats for this campaign yet!\n";
	} else {
		echo "Total: ".$retval['total']."\n";
		foreach($retval['data'] as $email){
			echo "\tE-mail: ".$email."\n";
		}
	}
}