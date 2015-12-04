<?php

class Application_Model_Country extends Zend_Db_Table_Abstract
{

	protected $_name = "country";

	function listAll()
	{
		$select = $this->select();
		return $this->fetchAll($select);
	}

}

