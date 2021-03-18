<?php 
namespace Block\Admin\Admin\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label' =>'Admin Information', 'Block' => 'Admin\Admin\Edit\Tabs\Information']);
		$this->addTab('data',['label' =>'Admin Data', 'Block' => 'Admin\Admin\Edit\Tabs\Data']);
		$this->setDefaultTab('information');
	}

}

?>