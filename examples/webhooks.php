<?php
/**
This Example shows how to webhoks using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$retval = $api->webhooks();

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load webhooks()!";
	echo "\tCode={$api->errorCode}\n";
	echo "\tMsg={$api->errorMessage}\n";
} else {
	echo sizeof($retval) . " Webhooks Returned:\n";
	foreach($retval as $c){
		echo "Webhook Id: {$c['id']} - {$c['title']}\n";
		echo "\tLast event: {$c['last_event']}\n";
		echo "\tTotal events: {$c['total_events']}\n";
	}
}
