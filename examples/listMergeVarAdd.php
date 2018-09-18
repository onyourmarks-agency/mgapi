<?php
/**
This Example shows how to listMergeVarAdd using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$tag = 'MERGE_TAG';
$name = 'Merge Tag name';
$options = array(
	"field_type"=>'text',
	"req"=>false,
	"default_value"=>'Default value',
	"show"=>true
);

$retval = $api->listMergeVarAdd($id, $tag, $name, $options);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listMergeVarAdd()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}