<?php
/**
This Example shows how to listSegmentCreate using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$list = $listId;
$title = 'Test Segment';
$match = 'all'; //any, or, all, and
$filter = array(
	array(
		'field' => 'merge0',
		'condition' => 'ends',//is, not, isany, contains, notcontain, starts, ends, greater, less
		'value' => '@gmail.com',
	),
	//...
	array(
		'field' => 'confirm_time',
		'condition' => 'greater',
		'value' => '2013-01-01',
	),
);
$auto_update = false;

$retval = $api->listSegmentCreate($list, $title, $match, $filter, $auto_update);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listSegmentCreate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "New Segment ID:".$retval."\n";
}
