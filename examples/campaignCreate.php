<?php
/**
This Example shows how to campaignCreate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$type = 'html';

$options = array(
	'list_id' => $listId,
	'subject' => 'Test Newsletter Subject',
	'from_email' => 'example@example.org',
	'from_name' => 'DEMO, Inc.',
	'tracking' => array(
		'opens' => true,
		'html_clicks' => true,
		'text_clicks' => false
	),
	'analytics' => array(
		'google' => 'my_google_analytics_key'
	),
	'title' => 'Test Newsletter Title'
);

$content = array(
	//'template_id' => 'template_id',
	//'html' => 'some pretty html content *[UNSUB]* message',
	//'plain' => 'some pretty plain content *[UNSUB]* message',
	//'url' => 'http://www.google.com',
	'archive' => base64_encode(file_get_contents('archive.tar')),
	'archive_type' => 'tar'
);

$retval = $api->campaignCreate($type, $options, $content);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignCreate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "New Campaign ID:".$retval."\n";
}