<?php
/**
This Example shows how to smsCampaignClickStats using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $smsCampaignId;

$retval = $api->smsCampaignClickStats($cid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load smsCampaignClickStats()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	if (sizeof($retval)==0){
		echo "No stats for this sms campaign yet!\n";
	} else {
		foreach($retval as $url=>$detail){
			echo "URL: ".$url."\n";
			echo "\tClicks = ".$detail['clicks']."\n";
			echo "\tUnique Clicks = ".$detail['unique']."\n";
		}
	}
}