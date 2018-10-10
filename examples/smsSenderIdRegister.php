<?php
/**
This Example shows how to smsSenderIdRegister using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$sender = 'TestSender';
$phone = $my_phone;
$company = 'Companu Name';
$fullname = 'Full Name';
$companyposition = 'developer';
$comments = 'some comments';

$retval = $api->smsSenderIdRegister($sender, $phone, $company, $fullname, $companyposition, $comments);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load smsSenderIdRegister()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "The request has been received!\n";
}
