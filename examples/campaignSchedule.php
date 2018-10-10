<?php
/**
This Example shows how to campaignSchedule using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

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
