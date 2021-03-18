<?php 
namespace Block\Admin\Shipping\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label' => 'Shipping Information', 'Block' => 'Admin\Shipping\Edit\Tabs\Information']);
		$this->addTab('data',['label' => 'Shipping Data', 'Block' => 'Admin\Shipping\Edit\Tabs\Data']);
		$this->setDefaultTab('information');
	}
}

?>