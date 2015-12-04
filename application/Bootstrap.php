<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public function _initAutoload ( )
	{
		// Add autoloader empty namespace
		$autoLoader = Zend_Loader_Autoloader::getInstance();
		$autoLoader->registerNamespace( 'MY_' );
		return $autoLoader;
	}

	public function _initPlugins() 
	{
		try {
		    $this->bootstrap('frontController') ;
		    $front = $this->getResource('frontController') ;
		    $front->registerPlugin( new MY_Plugins_Router() );
		} catch (Exception $e) {
		    echo $e->getMessage();
		}
	}

}

