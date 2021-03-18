<?php 
namespace Block\Admin\Category\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label' => 'Category Information', 'Block' => 'Admin\Category\Edit\Tabs\Information']);
		$this->addTab('data',['label' => 'Category Data', 'Block' => 'Admin\Category\Edit\Tabs\Data']);
		$this->setDefaultTab('information');
	}
}

?>