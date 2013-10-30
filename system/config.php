<?php
namespace system;

class Config {
	
	public static $instance = null;
	
	public static $configPath = null;
	public static $configPool = array();
		
	private function __construct() { }
	private function __clone() {}
	
	
	public static function getInstance() {
		if(self::$instance == null) {
			self::$instance = new Config();
		}
		return self::$instance;
	}
	
	
	/**
	 * 
	 * @param string $dirPath
	 */
	public function setConfigDirectory($dirPath = 'DEFAULT') {
		
		if($dirPath == 'DEFAULT') {
			self::$configPath = dirname(__FILE__). DIRECTORY_SEPARATOR . 'config';
		}
		else {
			if(is_dir($dirPath) && is_readable($dirPath)) {
				self::$configPath = $dirPath;				
			}
		}
	}
	
	/**
	 * 
	 * @param unknown $fileName
	 * @return multitype:
	 */
	public function getConfigFile($fileName) {
		
		if(array_key_exists($fileName, self::$configPool)) {
			return self::$configPool[$fileName];
		}
		else {
			self::$configPool[$fileName] = include self::$configPath . DIRECTORY_SEPARATOR . $fileName . '.php';
			return self::$configPool[$fileName];
		}
	}
	
	/**
	 * 
	 * @param unknown $fileName
	 * @param unknown $configProperty
	 * @return Ambigous <>
	 */
	public function getConfigProperty($fileName, $configProperty) {
		$collection = self::getConfigFile($fileName);
		
		return $collection[$configProperty];
	}
	
	
}	