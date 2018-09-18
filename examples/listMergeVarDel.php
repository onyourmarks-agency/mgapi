<?php
/**
This Example shows how to listMergeVarDel using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$tag = 'MERGE_TAG';

$retval = $api->listMergeVarDel($id, $tag);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listMergeVarDel()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}