<?php
/**
This Example shows how to listUpdateMember using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$id = $listId;
$email_address = $my_email;
$merge_vars = array("FNAME"=>'Richard', "LNAME"=>'Wright');
$email_type = 'html';

$retval = $api->listUpdateMember($id, $email_address, $merge_vars, $email_type);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listUpdateMember()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}
