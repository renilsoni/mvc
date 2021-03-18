<?php 
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Data extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/shipping/edit/tabs/data.php');
	}
}

?>