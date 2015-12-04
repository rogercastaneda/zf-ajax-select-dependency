<?php

class Application_Form_World extends Zend_Form
{

    public function init()
    {
        $this->setMethod(Zend_Form::METHOD_POST);

        $country = new Zend_Form_Element_Select('country');
        $country->setLabel('Country');
        $mdlCountry = new Application_Model_Country();
        $countries = $mdlCountry->listAll();
        $country->addMultiOption(0,'Select Country');
        foreach ($countries as $countryItem) {
        	$country->addMultiOption($countryItem->id, $countryItem->name);
        }
        $this->addElement($country);

        $city = new Zend_Form_Element_Select('city');
        $city->setLabel('City');
        $this->addElement($city);
    }


}

