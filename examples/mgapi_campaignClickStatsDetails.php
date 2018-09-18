<?php
/**
This Example shows how to campaignClickStatsDetails using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $campaignId;
$filters = [
	// 'linkId' => '000000',
	'link' => 'http://example.com/',
];
$start = 0;
$limit = 25;

$retval = $api->campaignClickStatsDetails($cid, $filters, $start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode) {
	echo "Unable to load campaignClickStatsDetails()!";
	echo "\tCode={$api->errorCode}\n";
	echo "\tMsg={$api->errorMessage}\n";
} else {
	if (sizeof($retval) == 0) {
		echo "No stats for this campaign yet!\n";
	} else {
		foreach ($retval as $detail) {
			echo "Email = {$detail['email']}\n";
			echo "Link = {$detail['link']}\n";
			echo "Date = {$detail['date']}\n";
			echo "Device = {$detail['device']}\n";
			echo "Browser = {$detail['browser']}\n";
			echo "\n";
		}
	}
}
