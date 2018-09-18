<?php
/**
This Example shows how to listGrowthHistory using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;

$retval = $api->listGrowthHistory($id);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to run listGrowthHistory()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {    
	foreach($retval as $history){
        echo $history['month']."\n";
        echo "\tExisting=".$history['existing']."\n";
        echo "\tImports=".$history['imports']."\n";
    }
}