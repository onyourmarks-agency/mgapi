<?php
/**
This Example shows how to campaignGeoOpens using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $campaignId;

$retval = $api->campaignGeoOpens($cid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignGeoOpens()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Open from ". sizeof($retval). " countries:\n";
	foreach($retval as $country){
        echo "\t".$country['code']."\t".$country['name']."\t".$country['opens']."\n";		
    }
}