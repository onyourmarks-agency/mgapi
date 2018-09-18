<?php
/**
This Example shows how to smsCampaignStats using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $smsCampaignId;

$retval = $api->smsCampaignStats($cid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load smsCampaignStats()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Stats for ".$cid."\n";
    foreach($retval as $k=>$v){
        echo "\t".$k." => ".$v."\n";
    }
}