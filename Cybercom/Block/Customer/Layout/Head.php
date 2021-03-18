<?php 
namespace Block\Customer\Layout;

\Mage::loadFileByClassName('Block\Core\Template');

class Head extends \Block\Core\Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/customer/layout/head.php');
	}
}

?>