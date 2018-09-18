<?php
/**
This Example shows how to campaignTemplates using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$retval = $api->campaignTemplates();

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignTemplates()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Your templates:\n";
	foreach($retval as $tmpl){
		echo "\t".$tmpl['id']." - ".$tmpl['name']." - ".$tmpl['layout']."\n";
	}
}