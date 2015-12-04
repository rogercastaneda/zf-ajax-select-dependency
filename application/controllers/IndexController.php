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


}



