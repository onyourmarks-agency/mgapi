<?php
/**
This Example shows how to listMergeVarUpdate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$tag = 'MERGE_TAG';
$options = array(
	"req"=>false,
	"name"=>'Merge Tag name',
	"default_value"=>'Default value',
	"show"=>true
);

$retval = $api->listMergeVarUpdate($id, $tag, $options);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listMergeVarUpdate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}