<?php 
namespace Block\Admin\Attribute\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label' => 'Attribute Information', 'Block' => 'Admin\Attribute\Edit\Tabs\Information']);
		
		$key = $this->getTableRow()->getPrimaryKey();
		if ($this->getTableRow()->$key) {
			$this->addTab('option',['label' => 'Attribute Option', 'Block' => 'Admin\Attribute\Edit\Tabs\Option']);
		}
			
		$this->setDefaultTab('information');
	}
}

?>