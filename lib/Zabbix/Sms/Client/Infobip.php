<?php
/**
 * Zabbix Sms Infobip client
 *
 * @package 	Zabbix
 * @subpackage 	Sms
 */
namespace Zabbix\Sms\Client;
use Zabbix\Sms AS ZS;

class Infobip extends ZS\Client
{
    /**
     * @var string
     */
    protected static $_baseUrl = 'https://api.infobip.com/sms/1/text/query/';

    /**
     * @see \Zabbix\Sms\Client::send()
     */
    public function send($recipient, $text)
    {
        $this->_params['text'] = $text;
        $this->_params['to'] = $recipient;
        parent::send($recipient, $text);
    }
}