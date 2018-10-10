<?php
/**
This Example shows how to listMembersByMerge using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$id = $listId;
$merge_var = "FNAME";
$merge_value = "Fname";
$status = "subscribed";
$start = 0;
$limit = 500;


$retval = $api->listMembersByMerge($id, $merge_var, $merge_value, $status, $start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listMembersByMerge()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Members returned: ". sizeof($retval). "\n";
	foreach($retval as $member){
	    echo "\t".$member['email']." - ".$member['timestamp']."\n";
	}
}
