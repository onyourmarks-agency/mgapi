<?php
/**
This Example shows how to campaignSchedule using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $campaignId;
$schedule_time = '2020-05-18 11:59:21';

$retval = $api->campaignSchedule($cid, $schedule_time);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignSchedule()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Campaign Scheduled to be delivered $schedule_time!\n";
}