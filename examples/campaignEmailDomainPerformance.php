<?php
/**
This Example shows how to campaignEmailDomainPerformance using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$cid = $campaignId;

$retval = $api->campaignEmailDomainPerformance($cid);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignEmailDomainPerformance()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	if (sizeof($retval)==0){
        echo "No Email Domain stats yet!\n";
    } else {
        foreach($retval as $domain){
            echo $domain['domain']."\n";
            echo "\tEmails: ".$domain['emails']."\n";
            echo "\tOpens: ".$domain['opens']."\n";
            echo "\tClicks: ".$domain['clicks']."\n";
        }
    }
}
