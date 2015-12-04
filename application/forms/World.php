<?php

class Application_Form_World extends Zend_Form
{

    public function init()
    {
        $this->setMethod(Zend_Form::METHOD_POST);

        $country = new Zend_Form_Element_Select('country');
        $country->setLabel('Country');
        $country->setRequired(true);
        $mdlCountry = new Application_Model_Country();
        $countries = $mdlCountry->listAll();
        $country->addMultiOption(0,'Select Country');
        foreach ($countries as $countryItem) {
        	$country->addMultiOption($countryItem->id, $countryItem->name);
        }
        $country->addValidators(array(
            new Zend_Validate_Db_RecordExists(array(
                'table' => 'country',
                'field' => 'id',
            ))
        ));
        $this->addElement($country);

        $city = new Zend_Form_Element_Select('city');
        $city->setLabel('City');
        $city->setRequired(true);
        $city->setRegisterInArrayValidator(false);
        $city->addValidators(array(
            new Zend_Validate_Db_RecordExists(array(
                'table' => 'city',
                'field' => 'id',
            ))
        ));
        $this->addElement($city);

        $btnSubmit = new Zend_Form_Element_Submit("btnSubmit");
        $btnSubmit->setLabel("Save");
        $this->addElement($btnSubmit);
    }


}

