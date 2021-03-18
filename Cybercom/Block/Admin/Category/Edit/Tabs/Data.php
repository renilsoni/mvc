<?php 
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Data extends \Block\Core\Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/category/edit/tabs/data.php');
	}
}

?>