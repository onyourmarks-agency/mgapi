<?php
/**
This Example shows how to campaignGeoOpens using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

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
