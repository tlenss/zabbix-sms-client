<?php
/**
 * Zabbix base Sms Client
 *
 * @author 		Thijs Lensselink <tl@lenss.nl> Dec 19, 2013
 * @package 	Zabbix
 * @subpackage 	Sms
 */
namespace Zabbix\Sms;

class Client
{
    /**
     * Logfile location
     * 
     * @var string
     */
    protected $_logfileLocation = '/var/log/zabbix-server/sms/';

    /**
     * Debug switch
     * 
     * @var boolean
     */
    protected $_debug = true;

    /**
     * API Url
     * 
     * @var string
     */
    protected $_url = null;

    /**
     * API request parameters
     * 
     * @var array
     */
    protected $_params = null;

    /**
     * Setup the client
     * 
     * @param array $config
     * @param boolean $debug
     * @throws Exception
     */
    public function __construct($config, $debug)
    {
        $this->_params = $config;
        $this->_debug = $debug;
        
        if (!is_dir($this->_logfileLocation) || !is_writable($this->_logfileLocation)) {
            throw new Exception("Check if logfile location {$this->_logfileLocation} exists and is writable");
        }
    }

    /**
     * Send a message
     * 
     * @throws Exception
     */
    public function send($recipient, $text)
    {
        $this->_url = self::BuildUrl($this->_params);
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        $error = curl_error($curl);
         
        curl_close($curl);

        $classArray = explode('\\', get_called_class());
        $class = end($classArray);

        if ($result === false) {
            self::Log($this->_logfileLocation . "sms_alert_" . $class . "_error_" . date("YmdHis"), $error);
            throw new Exception($error);
        } elseif ($this->_debug || $result != 100) {
            self::Log($this->_logfileLocation . "sms_alert_" . $class . "_answer_". date("YmdHis"), $result);
        }
    }

    /**
     * Log to given logfile
     * 
     * @param string $file
     * @param string $message
     */
    protected static function Log($file, $message)
    {
        file_put_contents($file, $message);
    }

    /**
     * Build the API Url
     * 
     * @param array $params
     * @return string|NULL
     */
    protected static function BuildUrl($params)
    {
        if (is_array($params) || !empty($params)) {
            return static::$_baseUrl . '?' . http_build_query($params);
        }
        return null;
    }
}
