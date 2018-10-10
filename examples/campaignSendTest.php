<?php
/**
This Example shows how to campaignSendTest using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$cid = $campaignId;
$test_emails = array($my_email, $boss_man_email);

$retval = $api->campaignSendTest($cid, $test_emails);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignSendTest()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Campaign Tests Sent!\n";
}
