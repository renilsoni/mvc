<?php 
namespace Block\Admin\Customer\Group\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Information extends \Block\Core\Template
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/group/edit/tabs/information.php');
	}
}

?>