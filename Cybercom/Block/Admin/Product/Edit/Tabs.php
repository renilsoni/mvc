<?php 
namespace Block\Admin\Product\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		
		$this->addTab('information',['label' =>'Product Information', 'Block' => 'Admin\Product\Edit\Tabs\Information']);

		$key = $this->getTableRow()->getPrimaryKey();
		if ($this->getTableRow()->$key) {
			$this->addTab('category',['label' =>'Product Category', 'Block' => 'Admin\Product\Edit\Tabs\Category']);
			$this->addTab('media',['label' =>'Product Media', 'Block' => 'Admin\Product\Edit\Tabs\Media']);
			$this->addTab('groupprice',['label' =>'Product Group Price', 'Block' => 'Admin\Product\Edit\Tabs\GroupPrice']);
			$this->addTab('attribute',['label' =>'Product Attribute', 'Block' => 'Admin\Product\Edit\Tabs\Attribute']);
		}

		$this->setDefaultTab('information');
	}

}

?>