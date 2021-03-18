<?php 
namespace Block\Admin\Customer\Group\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label' => 'Group Information', 'Block' => 'Admin\Customer\Group\Edit\Tabs\Information']);
		$this->addTab('data',['label' => 'Gropu Data', 'Block' => 'Admin\Customer\Group\Edit\Tabs\Data']);
		$this->setDefaultTab('information');
	}
}

?>