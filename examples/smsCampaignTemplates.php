<?php
/**
This Example shows how to smsCampaignTemplates using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$retval = $api->smsCampaignTemplates();

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load smsCampaignTemplates()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Your templates:\n";
	foreach($retval as $tmpl){
		echo "\t".$tmpl['id']." - ".$tmpl['text']."\n";
	}
}
