<?php
namespace system;

class FrontController {
	
	public $router = null;
	
	public $controller 	= null;
	public $method	 	= null;
	
	public function __construct() {
		$this->router = new routers\BaseRouter();
	}
	
	
	public function dispach() {
		$url = $this->router->getURL();
		$newURL =  explode('/', $url);
		
		if($newURL[0]) {
			$this->controller = $newURL[0];
			
			if(isset($newURL[1])) {
				$this->method = $newURL[1];
			}
			else {
				$this->method = "index";
			}
		}
		else {
			$this->controller = "index";
			$this->method = "index";
		}
		
		$className = 'application\controllers\\'. $this->controller;
		
		$newObject = new $className();
		$newObject->{$this->method}();
		
	}
	
}