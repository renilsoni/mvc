<?php 
namespace Block\Admin\CmsPage;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{

	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Admin\CmsPage\Edit\Tabs'));
	}
}

?>