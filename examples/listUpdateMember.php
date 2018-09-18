<?php
/**
This Example shows how to listUpdateMember using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

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