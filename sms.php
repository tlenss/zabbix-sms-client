#!/usr/bin/php
<?php
require_once 'lib/Zabbix/Sms/Autoload.php';

require 'config.php';

use Zabbix\Sms AS ZS;

ZS\Autoload::register(dirname(__FILE__) . '/lib');

if (count($argv)<3) {
    die("Usage: {$argv[0]} [recipient] [subject] [message]\n");
}

try {
    $client = ZS\Factory::Get(GATEWAY_TYPE, GATEWAY_PARAMS);

    $client->send($argv[1], implode(':', [$argv[2], $argv[3]]));
} catch (ZS\Exception $e) {
    echo $e->getMessage();
}
