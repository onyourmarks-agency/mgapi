<?php
/**
This Example shows how to listMemberInfo using the MGAPI.php class and do some basic error checking.
**/
use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

$id = $listId;
$email_address = $my_email;

$retval = $api->listMemberInfo($id, $email_address);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load listMemberInfo()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {    
	foreach($retval as $k=>$v){
        if (is_array($v)){
            //handle the merges
            foreach($v as $l=>$w){
                echo "\t$l = $w\n";
            }
        } else {
            echo "$k = $v\n";
        }
    }
}
