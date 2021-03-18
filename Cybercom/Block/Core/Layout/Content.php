<?php 
namespace Block\Core\Layout;

\Mage::loadFileByClassName('Block\Core\Template');

class Content extends \Block\Core\Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/layout/content.php');
	}
}

?>