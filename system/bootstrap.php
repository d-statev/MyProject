<?php
namespace system;

include 'system/loader.php'; 

class Bootstrap {
	
	private $_config = null;
	
	public function __construct() {
		\Loader::setAutoloader();
		$this->_config = Config::getInstance();
	}
	
	public function init() {
		
		$fcontroller = new FrontController();
		$fcontroller->dispach();		
	}
}