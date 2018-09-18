<?php
/**
This Example shows how to smsCampaigns using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$retval = $api->smsCampaigns();

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load smsCampaigns()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo sizeof($retval)." SMS Campaigns Returned:\n";
	foreach($retval as $c){
		echo "Campaign Id: ".$c['id']." - ".$c['title']."\n";
		echo "\tStatus: ".$c['status']."\n";
		echo "\tsent: ".$c['send_time']." to ".$c['sms_sent']." members\n";
	}
}