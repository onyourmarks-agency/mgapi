<?php
/**
This Example shows how to campaignClickStats using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $campaignId;
$start = 0;
$limit = 1000;

$retval = $api->campaignForwardStats($cid, $start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignForwardStats()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	if (sizeof($retval)==0){
		echo "No stats for this campaign yet!\n";
	} else {
		foreach($retval as $email=>$detail){
			echo "E-mail: ".$email."\n";
			echo "\tFriend name = ".$detail['friend_name']."\n";
		}
	}
}