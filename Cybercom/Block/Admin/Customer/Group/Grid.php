<?php 
namespace Block\Admin\Customer\Group;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{

	protected $customergroup = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/group/grid.php');
		$this->setCustomerGroup();
	}

	public function setCustomerGroup()
	{
		$group = \Mage::getModel('Customer\Group');
		$this->customergroup = $group->fetchAll();
		return $this;
	}

	public function getCustomerGroup()
	{
		return $this->customergroup;
	}
}

?>