<?php 
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{

	function __construct()
	{
		Parent::__construct();
		$this->setTabClass(\Mage::getBlock('Admin\Customer\Edit\Tabs'));
	}

}

?>