#!/usr/bin/php
<?php
require_once 'lib/Zabbix/Sms/Autoload.php';

use Zabbix\Sms AS ZS;

ZS\Autoload::register('./lib');

if (count($argv)<3) {
    die("Usage: {$argv[0]} recipient subject message\n");
}

try {
    $client = ZS\Factory::Get('Nexmo', array(
        "username" => '',
        "password" => '',
        "to"       => $argv[1],
        "from"     => 'Zabbix',
    ));

    $client->send($argv[2] . ':' . $argv[3]);
} catch (ZS\Exception $e) {
    echo $e->getMessage();
}