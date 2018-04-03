<?php
/**
 * Zabbix Sms Nexmo client
 *
 * @author 		Thijs Lensselink <tl@lenss.nl> Dec 19, 2013
 * @package 	Zabbix
 * @subpackage 	Sms
 */
namespace Zabbix\Sms\Client;

use Zabbix\Sms AS ZS;

class Nexmo extends ZS\Client
{
    /**
     * API Url
     * 
     * @var string
     */
    protected static $_baseUrl = 'http://rest.nexmo.com/sms/json';

    /**
     * Set message var and call parent::send
     * 
     * @see \Zabbix\Sms\Client::send()
     */
    public function send($text)
    {
        $this->_params['text'] = $text;

        parent::send($text);
    }
}
