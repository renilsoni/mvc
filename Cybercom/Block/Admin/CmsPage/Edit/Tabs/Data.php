<?php 
namespace Block\Admin\CmsPage\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Data extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/cmspage/edit/tabs/data.php');
	}
}

?>