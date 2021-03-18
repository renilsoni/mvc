<?php 
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $customer = null;
	protected $customers = [];

	function __construct()
	{
		Parent::__construct();
		$this->setTemplate('./View/admin/customer/grid.php');
	}

	public function getCustomer()
	{
		if (!$this->customer) {
			$this->setCustomer();
		}
		return $this->customer;
	}

	public function setCustomer($customer = null)
	{
		if (!$customer) {
			$customer = \Mage::getModel('Customer');
		}
		$this->customer = $customer;
		return $this;
	}

	public function getCustomers()
	{
		if (!$this->customers) {
			$this->setCustomers();
		}
		return $this->customers;
	}

	public function setCustomers($customers = null)
	{
		if (!$customers) {
			$customer = $this->getCustomer();
			$sql = "Select c.*,cg.name as groupname, ca.zipcode as zipcode from `customer` c INNER JOIN `customer_group` cg ON c.groupId = cg.groupId INNER JOIN `customer_address` ca ON ca.customerId = c.customerId WHERE ca.addressType = 1";
			$customers = $customer->fetchAll($sql);
		}
		$this->customers = $customers;
		return $this;
	}

}

?>