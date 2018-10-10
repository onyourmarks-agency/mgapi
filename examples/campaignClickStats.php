<?php
/**
This Example shows how to campaignClickStats using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$cid = $campaignId;

$retval = $api->campaignClickStats($cid);

header("Content-Type: text/plain");
if ($api->errorCode) {
	echo "Unable to load campaignClickStats()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	if (sizeof($retval) == 0) {
		echo "No stats for this campaign yet!\n";
	} else {
		foreach ($retval as $detail) {
			echo "Link id: {$detail['id']} - {$detail['url']}\n";
			echo "\tClicks = {$detail['clicks']}\n";
			echo "\tUnique Clicks = {$detail['unique']}\n";
		}
	}
}
