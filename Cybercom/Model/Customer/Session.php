<?php 
namespace Model\Customer;
\Mage::loadFileByClassName('Model\Core\Session');

class Session extends \Model\Core\Session
{
	
	function __construct()
	{
		parent::__construct();
		$this->setNameSpace('customer');
	}
}

?>