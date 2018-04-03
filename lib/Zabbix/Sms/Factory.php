<?php
/**
 * Zabbix Sms Client builder
 *
 * @author 		Thijs Lensselink <tl@lenss.nl> Dec 19, 2013
 * @package 	Zabbix
 * @subpackage 	Sms
 */
namespace Zabbix\Sms;

class Factory
{
    /**
     * Construct an Sms client
     * 
     * @param string $clientType
     * @param array $params
     * @param boolean $debug
     * @throws Exception
     * @return Zabbix\Sms\Client
     */
    public static function Get($clientType, $params, $debug = false)
    {
        $className = 'Zabbix\Sms\Client\\' . ucfirst($clientType);

        if (class_exists($className)) {
            return new $className($params, $debug);
        }

        throw new Exception("No client found for type : {$clientType}");
    }
}
