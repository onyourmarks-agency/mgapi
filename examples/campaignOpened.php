<?php
/**
This Example shows how to campaignOpened using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$cid = $campaignId;
$start = 0;
$limit = 1000;

$retval = $api->campaignOpened($cid, $start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignOpened()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	if (sizeof($retval)==0){
		echo "No stats for this campaign yet!\n";
	} else {
		echo "Total: ".$retval['total']."\n";
		foreach($retval['data'] as $data){
			echo "\tE-mail: ".$data['email']."\n";
			echo "\tCount: ".$data['count']."\n\n";
		}
	}
}
