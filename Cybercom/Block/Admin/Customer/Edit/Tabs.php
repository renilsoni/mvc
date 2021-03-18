<?php 
namespace Block\Admin\Customer\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label' => 'Customer Information', 'Block' => 'Admin\Customer\Edit\Tabs\Information']);

		$key = $this->getTableRow()->getPrimaryKey();
		if ($this->getTableRow()->$key) {
			$this->addTab('address',['label' => 'Customer Address', 'Block' => 'Admin\Customer\Edit\Tabs\Address']);
		}

		$this->setDefaultTab('information');
	}
}

?>