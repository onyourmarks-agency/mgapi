<?php
/**
This Example shows how to listMergeVars using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$id = $listId;

$retval = $api->listMergeVars($id);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listMergeVars()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Merge tags returned: ". sizeof($retval). "\n";
	foreach($retval as $i => $var){
	    echo "Var #$i:\n";
	    echo "\tTag: ". $var['tag']."\n";
	    echo "\tName: ". $var['name']."\n";
	    echo "\tRequired: ". $var['req']."\n";
	
	}
}
