<?php 
namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Option extends \Block\Core\Template
{
	protected $attributeOption = null;
	protected $attribute = null;

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/attribute/edit/tabs/option.php');
	}

	public function getAttributeOption()
	{
		if (!$this->attributeOption) {
			$this->setAttributeOption();
		}
		return $this->attributeOption;
	}

	public function setAttributeOption($attributeOption = null)
	{
		if (!$attributeOption) {
			$attributeOption = \Mage::getModel('Attribute\Option');
		}
		$this->attributeOption = $attributeOption;
		return $this;
	}

}

?>