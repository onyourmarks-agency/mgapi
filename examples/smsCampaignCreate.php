<?php
/**
This Example shows how to smsCampaignCreate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$type = 'html';

$options = array(
	'sender' => $smsSenderID,
	'recipients' => array(
		'list_id' => $listId,
		//'segment_id' => $segmentId,
		'merge' => $smsMergeField,
	),
	'tracking' => array(
		'clicks' => true
	),
	'analytics' => array(
		'google' => 'my_google_analytics_key'
	),
	'title' => 'Test SMS Title',
	'unicode' => true,
	'concatenate' => true
);

$content = array(
	//'template_id' => 'template_id',
	'text' => 'some pretty content message',
);

$retval = $api->smsCampaignCreate($options, $content);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load smsCampaignCreate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "New SMS Campaign ID:".$retval."\n";
}