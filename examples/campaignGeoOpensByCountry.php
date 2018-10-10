<?php
/**
This Example shows how to campaignGeoOpensByCountry using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$cid = $campaignId;
$code = 'LV';

$retval = $api->campaignGeoOpensByCountry($cid, $code);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignGeoOpensByCountry()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	if (empty($retval)) {
		echo "No stats for this country present\n";
	} else {
		echo "Country code: " . $retval["code"] . "\n";
		echo "Country name: " . $retval["name"] . "\n";
		echo "Opens: " . $retval["opens"] . "\n";
	}
}
