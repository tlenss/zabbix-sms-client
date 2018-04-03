<?php
/**
 * Zabbix Sms Clockwork client
 *
 * @author 		Thijs Lensselink <tl@lenss.nl> Dec 19, 2013
 * @package 	Zabbix
 * @subpackage 	Sms
 */
namespace Zabbix\Sms\Client;

use Zabbix\Sms AS ZS;

class Clockwork extends ZS\Client
{
    /**
     * API Url
     *
     * @var string
     */
    protected static $_baseUrl = 'https://api.clockworksms.com/http/send.aspx';

    /**
     * Set message var and call parent::send
     *
     * @see \Zabbix\Sms\Client::send()
     */
    public function send($recipient, $text)
    {
        $this->_params['content'] = $text;
        $this->_params['to'] = $recipient;
        $this->_params['long'] = 1;

        parent::send($recipient, $text);
    }
}
