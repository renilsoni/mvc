<?php 
namespace Block\Admin\CmsPage\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function prepareTabs()
	{
		$this->addTab('information',['label' => 'CMS Information', 'Block' => 'Admin\CmsPage\Edit\Tabs\Information']);
		$this->addTab('data',['label' => 'CMS Data', 'Block' => 'Admin\CmsPage\Edit\Tabs\Data']);
		$this->setDefaultTab('information');
	}
}

?>