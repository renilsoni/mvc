<?php 
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Address extends \Block\Core\Template
{
	protected $shipping = null;
	protected $billing = null;

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/edit/tabs/address.php');
	}

	public function getShipping()
	{
		if (!$this->shipping) {
			$this->setShipping();
		}
		return $this->shipping;
	}

	public function setShipping($shipping = null)
	{
		if (!$shipping) {
			$shipping = \Mage::getModel('Customer\Address');
			$key = $this->getTableRow()->getPrimaryKey();
			if ($id = $this->getTableRow()->$key) {
				$sql = "select * from {$shipping->getTableName()} where {$key} = {$id} and addressType = 2";
				$shipping = $shipping->fetchRow($sql);
				if (!$shipping) {
					$shipping = \Mage::getModel('Customer\Address');
				}
			}
		}
		$this->shipping = $shipping;
		return $this;
	}

	public function getBilling()
	{
		if (!$this->billing) {
			$this->setBilling();
		}
		return $this->billing;
	}

	public function setBilling($billing = null)
	{
		if (!$billing) {
			$billing = \Mage::getModel('Customer\Address');
			$key = $this->getTableRow()->getPrimaryKey();
			if ($id = $this->getTableRow()->$key) {
				$sql = "select * from {$billing->getTableName()} where {$key} = {$id} and addressType = 1";
				$billing = $billing->fetchRow($sql);
				if (!$billing) {
					$billing = \Mage::getModel('Customer\Address');
				}
			}
		}
		$this->billing = $billing;
		return $this;
	}
}

?>