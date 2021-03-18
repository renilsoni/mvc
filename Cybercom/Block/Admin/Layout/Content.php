<?php 
namespace Block\Admin\Layout;

\Mage::loadFileByClassName('Block\Core\Template');

class Content extends \Block\Core\Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/layout/content.php');
	}
}

?>