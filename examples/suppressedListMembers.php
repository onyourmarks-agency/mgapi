<?php
/**
This Example shows how to suppressedListMembers using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$start = 0;
$limit = 500;

$retval = $api->suppressedListMembers($start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load suppressedListMembers()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Members returned: ". sizeof($retval). "\n";
	foreach($retval as $member){
	    echo "\t".$member['email']." - ".$member['timestamp']."\n";
	}
}
