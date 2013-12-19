<?php
/**
 * Zabbix Sms Budgetsms client
 *
 * @author 		Thijs Lensselink <tl@lenss.nl> Dec 19, 2013
 * @package 	Zabbix
 * @subpackage 	Sms
 */
namespace Zabbix\Sms\Client;

use Zabbix\Sms AS ZS;

class Budgetsms extends ZS\Client
{
    /**
     * API Url
     *
     * @var string
     */
    protected static $_baseUrl = 'http://www.budgetsms.net/api/sendsms';

    /**
     * Set message var and call parent::send
     *
     * @see \Zabbix\Sms\Client::send()
     */
    public function send($text)
    {
        $this->_params['msg'] = $text;

        parent::send();
    }
}