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
    protected static $_baseUrl = 'https://platform.clickatell.com/messages/http/send';

    /**
     * Set message var and call parent::send
     *
     * @see \Zabbix\Sms\Client::send()
     */
    public function send($recipient, $text)
    {
        $this->_params['content'] = $text;
        $this->_params['to'] = $recipient;

        parent::send($recipient, $text);
    }
}
