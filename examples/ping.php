<?php
/**
 * This Example shows how to ping using the MGAPI.php class and do some basic error checking.
 */

use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/inc/config.inc.php';

$api = new MGAPI($apikey);

echo $api->ping();
