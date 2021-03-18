<?php 

Mage::loadFileByClassName('Block_Core_Template');

class Block_Template_Header extends Block_Core_Template
{
	function __construct()
	{
		$this->setTemplate('./View/admin/template/header.php');
	}
}

?>