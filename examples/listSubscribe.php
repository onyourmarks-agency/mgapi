<?php
/**
This Example shows how to listSubscribe using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$id = $listId;
$email_address = $my_email;
$merge_vars = array('EMAIL'=>$my_email, 'FNAME'=>'Joe'); // or $merge_vars = array();
$email_type = 'html';
$double_optin = true;
$update_existing = false;
$send_welcome = false;

$retval = $api->listSubscribe($id, $email_address, $merge_vars, $email_type, $double_optin, $update_existing, $send_welcome);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listSubscribe()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Returned: ".$retval."\n";
}