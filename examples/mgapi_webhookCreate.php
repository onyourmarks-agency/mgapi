<?php
/**
This Example shows how to webhookCreate using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$title = 'Test Webhook';

$options = array(
	'list_id' => $listId,
	'url' => 'http://www.example.com/webhook-listener/',
	'secret_key' =>	'secret',
	'events' => array(
		'contact.subscribe',
		'contact.unsubscribe',
		'contact.update',
		// 'email.change',
		// 'email.bounce',
		'email.open',
		'email.click',
	),
	'sources' => array(
		'subscriber',
		// 'admin',
		'api',
	),
);

$retval = $api->webhookCreate($title, $options);

header("Content-Type: text/plain");
if ($api->errorCode) {
	echo "Unable to load webhookCreate()!\n";
	echo "\tCode={$api->errorCode}\n";
	echo "\tMsg={$api->errorMessage}\n";
} else {
	echo "New Webhook ID: {$retval}\n";
}
