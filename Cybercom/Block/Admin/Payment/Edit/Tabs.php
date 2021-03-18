<?php 
namespace Block\Admin\Payment\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label' => 'Payment Information', 'Block' => 'Admin\Payment\Edit\Tabs\Information']);
		$this->addTab('data',['label' => 'Payment Data', 'Block' => 'Admin\Payment\Edit\Tabs\Data']);
		$this->setDefaultTab('information');
	}
}

?>