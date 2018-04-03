<?php
/**
 * Zabbix Sms Simple autoloader
 *
 * @author 		Thijs Lensselink <tl@lenss.nl> Dec 19, 2013
 * @package 	Zabbix
 * @subpackage 	Sms
 */
namespace Zabbix\Sms;

class Autoload
{
    /**
     * Package name
     * 
     * @var string
     */
    const PACKAGE = 'Zabbix';
    
    /**
     * Package library path
     * 
     * @var string
     */
    private static $_path;
    
    /**
     * Register a new library path
     * 
     * @param string $path
     */
    public static function register($path)
    {
        self::$_path = $path;
        self::addPath($path);
        
        spl_autoload_register(array(__CLASS__, 'load'));
    }
    
    /**
     * Load a requested class
     * 
     * @param string $class
     * @return boolean
     */
    public static function load($class)
    {
        if (substr($class, 0, strlen(self::PACKAGE)) != self::PACKAGE) {
            return false;
        }
    
        $path = sprintf(
            '%s/%s.php',
            self::$_path,
            str_replace('\\', '/', $class)
        );
    
        if (file_exists($path)) {
            require_once($path);
        }
    }
    
    /**
     * Add a path to include_paths
     * 
     * @param string $items
     */
    public static function addPath($items)
    {
        $elements = explode(PATH_SEPARATOR, get_include_path());
    
        set_include_path(implode(
            PATH_SEPARATOR,
            array_unique(array_merge((array)$items, $elements))
        ));
    }
}
