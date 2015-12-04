<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->getHelper( 'contextSwitch' );
        $ajaxContext->addActionContext( 'getcitiesbycountry', array( 'json' ) );
        $ajaxContext->initContext();
    }

    public function indexAction()
    {
        $frm = new Application_Form_World();
        $frm->setAction('save');
        $this->view->frm = $frm;
    }

    public function getcitiesbycountryAction()
    {
    	$request = $this->getRequest();
    	$countryId = $request->getParam('id');
    	$mdlCity = new Application_Model_City();
    	$cityList = $mdlCity->listAllByCountry($countryId);
        $this->view->result = $cityList->toArray();
    }

    public function saveAction()
    {
    	$frm = new Application_Form_World();
        $request = $this->getRequest();
        if ( $request->isPost() )
        {
        	if ( $frm->isValid( $request->getPost() ) )
        	{
        		$this->view->country = $frm->getValue('country');
        		$this->view->city = $frm->getValue('city');
        	} else {
        		var_dump($frm->getErrors());
        		exit;
        	}
        }
    }


}





