<?php
class Loader {
	
	public static function setAutoloader() {
		spl_autoload_register(array('Loader', 'getAutoloader'));
	}
	
	public static function getAutoloader($className) {
		include $className . '.php';
	}
	
}