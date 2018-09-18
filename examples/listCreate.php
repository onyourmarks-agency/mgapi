<?php
/**
This Example shows how to listCreate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$title = 'Test List';

$options = array(
	'permission_reminder' => 'Write a short reminder about how the recipient joined your list.',
	'notify_to' => 'example@example.org',
	'subscription_notify' => true,
	'unsubscription_notify' => true,
	'has_email_type_option' => true,
	'public_title' => "Public {$title}",
);

$retval = $api->listCreate($title, $options);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listCreate()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "New List ID:".$retval."\n";
}
