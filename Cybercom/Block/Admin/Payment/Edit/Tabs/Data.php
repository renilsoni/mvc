<?php 
namespace Block\Admin\Payment\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Data extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/payment/edit/tabs/data.php');
	}
}

?>