<?php 
namespace Block\Admin\Admin\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Data extends \Block\Core\Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/admin/edit/tabs/data.php');
	}
}

?>