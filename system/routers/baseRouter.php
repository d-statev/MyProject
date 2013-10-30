<?php
namespace system\routers;

class BaseRouter implements IRouter {
	
	public function getURL() {
		$uri = ltrim($_SERVER['PATH_INFO'], '/');
		return $uri;
	}
}