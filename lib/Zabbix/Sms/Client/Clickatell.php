<?php
/**
 * Zabbix Sms Clickatell client
 *
 * @author 		Thijs Lensselink <tl@lenss.nl> Dec 19, 2013
 * @package 	Zabbix
 * @subpackage 	Sms
 */
namespace Zabbix\Sms\Client;

use Zabbix\Sms AS ZS;

class Clickatell extends ZS\Client
{
    /**
     * API Url
     *
     * @var string
     */
    protected static $_baseUrl = 'http://api.clickatell.com/http/sendmsg';

    /**
     * Set message var and call parent::send
     *
     * @see \Zabbix\Sms\Client::send()
     */
    public function send($text)
    {
        $this->_params['text'] = $text;
        $this->_params['concat'] = 3;

        parent::send($text);
    }
}
