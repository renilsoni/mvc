<?php 
namespace Block\Customer;
\Mage::loadFileByClassName('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
	function __construct()
	{
		$this->setTemplate('./View/customer/layout/one_column.php');
		$this->prepareChildren();
	}

	public function prepareChildren()
	{
		$this->addChild(\Mage::getBlock('Customer\Layout\Header'),'header');
		$this->addChild(\Mage::getBlock('Customer\Layout\Left'),'left');
		$this->addChild(\Mage::getBlock('Customer\Layout\Content'),'content');
		$this->addChild(\Mage::getBlock('Customer\Layout\Right'),'right');
		$this->addChild(\Mage::getBlock('Customer\Layout\Footer'),'footer');
	}
}

?>