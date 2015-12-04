<?php

class Application_Model_City extends Zend_Db_Table_Abstract
{

	protected $_name = "city";

	function listAllByCountry($countryId)
	{
		$select = $this->select();
		$select->where('country_id=?', $countryId, Zend_Db::INT_TYPE);
		return $this->fetchAll($select);
	}

}

