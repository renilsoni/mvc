<?php 
namespace Block\Admin\Customer\Group;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{

	protected $customerGroup = null;

	function __construct()
	{
		Parent::__construct();
		$this->setTabClass(\Mage::getBlock('Admin\Customer\Group\Edit\Tabs'));
	}

}

?>