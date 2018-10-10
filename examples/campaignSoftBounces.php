<?php
/**
This Example shows how to campaignSoftBounces using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$cid = $campaignId;
$start = 0;
$limit = 1000;

$retval = $api->campaignSoftBounces($cid, $start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignSoftBounces()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "E-mails returned: ".sizeof($retval)."\n";
	foreach($retval as $email){
        echo "\t".$email."\n";		
    }
}
