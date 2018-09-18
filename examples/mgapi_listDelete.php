<?php
/**
This Example shows how to listDelete using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;

$retval = $api->listDelete($id);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listDelete()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "List Deleted!\n";
}