<?php
/**
This Example shows how to campaignSendTest using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

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