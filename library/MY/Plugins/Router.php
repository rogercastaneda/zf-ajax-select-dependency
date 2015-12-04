<?php
class MY_Plugins_Router extends Zend_Controller_Plugin_Abstract
{
    
	public function routeStartup( Zend_Controller_Request_Abstract $request )
	{
	    
	    $frontController = Zend_Controller_Front::getInstance();
	    $router = $frontController->getRouter();
	    $options = array();
	    
	    $options['controller'] = 'index';

	    $options['action'] = 'save';
	    $route = new Zend_Controller_Router_Route( 'save', $options );
	    $router->addRoute('save', $route);

	    // ajax...
	    $options['action'] = 'getcitiesbycountry';
	    $options['format'] = 'json';
	    $options['id'] = 0;
	    $route = new Zend_Controller_Router_Route( 'getcitiesbycountry/:id', $options );
	    $router->addRoute('getcitiesbycountry/:id', $route);
	    
	    	    
	    
	}
	
}